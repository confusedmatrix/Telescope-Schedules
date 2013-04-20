<?php

/*
 * This file is part of the TelescopeSchedules package.
 *
 * (c) Christopher Briggs <chris@jooldesign.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TelescopeSchedules\Telescopes;

use TelescopeSchedules\Scraper\Scraper;

/**
 * SwiftTelescope class.
 *
 * @package telescopeschedules
 * @extends Telescope 
 * @author Christopher Briggs <chris@jooldesign.co.uk>
 */
class SwiftTelescope extends Telescope {
    
    /**
     * id
     *
     * id of the telescope in the DB
     * 
     * @var mixed
     * @access protected
     */
    private $id = 3;

    /**
     * data_url
     *
     * url to scrape new data from
     * 
     * @var mixed
     * @access protected
     */
    private $data_url = 'https://www.swift.psu.edu/operations/obsSchedule.php?d={0}&a=0';

    /**
     * getData function.
     *
     * Reurns requested page from data_url
     * 
     * @access public
     * @param batch
     * @return string
     */
    public function getData($batch) {

        $batch = \DateTime::createFromFormat('Y-m-d', $batch, new \DateTimeZone('UTC'));
        $last_batch = $this->determineLastBatchId();
        $di = new \DateInterval('P1D');

        $data = array();
        while ($batch->format('Y-m-d') <= $last_batch) {

            $this->data_url = str_replace('{0}', $batch->format('Y-m-d'), $this->data_url);

            $scraper = new Scraper($this->data_url);
            $table = $scraper->scrape()->match('/(<table class=\'ppst\'>.*?<\/table>)/s');

            $rows = $scraper->matchAll('/<tr(.*?)<\/tr>/s', $table);

            foreach($rows as $k => $row) {
                
                if ($k > 1) {

                    $d = $scraper->matchAll('/<td.*?>&nbsp;(.*?)&nbsp;<\/td>/s', $row);
                    $data[] = array(
                        'telescope_id'  => $this->id,
                        'batch'         => $batch->format('Y-m-d'),
                        'obs_id'        => '', // no obs_id
                        'obs_target'    => $d[4],
                        'start'         => $this->dateToTimestamp($d[0]),
                        'end'           => $this->dateToTimestamp($d[1]),
                        'obs_ra'        => $d[5],
                        'obs_decl'      => $d[6],
                        'notes'         => '' // no notes
                    );

                }

            }

            $batch->add($di);

        }

        return $data;

    }

    /**
     * determineLastBatchId function.
     *
     * Determines the last batch id from the data_url page
     * 
     * @access public
     * @return string
     */
    public function determineLastBatchId() {

        return date('Y-m-d', time());

    }

    /**
     * dateToTimestamp function.
     *
     * Converts date/time string to unix timestamp
     * 
     * @access private
     * @param date
     * @return string
     */
    private function dateToTimestamp($date) {

        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $date, new \DateTimeZone('UTC'));
        return $date->format('U');

    }

}