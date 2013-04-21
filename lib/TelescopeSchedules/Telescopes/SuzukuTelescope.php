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
 * SuzukuTelescope class.
 *
 * @package telescopeschedules
 * @extends Telescope 
 * @author Christopher Briggs <chris@jooldesign.co.uk>
 */
class SuzukuTelescope extends Telescope {
    
    /**
     * id
     *
     * id of the telescope in the DB
     * 
     * @var mixed
     * @access protected
     */
    private $id = 6;

    /**
     * data_url
     *
     * url to scrape new data from
     * 
     * @var mixed
     * @access protected
     */
    private $data_url = 'http://www.astro.isas.ac.jp/suzaku/schedule/shortterm/html/shortterm_{0}.html';

    /**
     * getData function.
     *
     * Reurns requested page from data_url
     * 
     * @access public
     * @return string
     */
    public function getData($batch) {

        $batch = \DateTime::createFromFormat('Y_md', $batch, new \DateTimeZone('UTC'));
        $last_batch = $this->determineLastBatchId();
        $di = new \DateInterval('P1D');

        $data = array();
        while ($batch->format('Y_md') <= $last_batch) {

            $data_url = str_replace('{0}', $this->determineLastBatchId(), $this->data_url);

            $scraper = new Scraper($data_url);
            $table = $scraper->scrape()->match('/<H3>Suzaku Shortterm Schedule (almost final)</H3>.*?(<TABLE.*?<\/TABLE>)/s');

            $rows = $scraper->matchAll('/<TR>(.*?)<\/TR>/s', $table);

            foreach($rows as $k => $row) {
                
                if ($k > 0) {
                    
                    $d = $scraper->matchAll('/<TD.*?>(.*?)<\/TD>/s', $row);
                    $data[] = array(
                        'telescope_id'  => $this->id,
                        'batch'         => $batch->format('Y_md'),
                        'obs_id'        => '', // no obs_id
                        'obs_target'    => strip_tags($d[0]),
                        'start'         => $this->dateToTimestamp($d[6]),
                        'end'           => $this->dateToTimestamp($d[6]) + 60,
                        'obs_ra'        => $d[2],
                        'obs_decl'      => $d[3],
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

        $url = 'http://www.astro.isas.ac.jp/suzaku/schedule/shortterm/';
        $scraper = new Scraper($url);
        return $scraper->scrape()->match('/<A HREF="html\/shortterm_(.*?)\.html/s');

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

        $date = \DateTime::createFromFormat('Y m d H i s', $date, new \DateTimeZone('UTC'));
        return !empty($date) ? $date->format('U') : 'date error';

    }

}