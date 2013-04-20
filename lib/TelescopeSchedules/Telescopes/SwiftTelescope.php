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
    private $data_url = 'https://www.swift.psu.edu/operations/obsSchedule.php?d=2013-04-19&a=0';

    /**
     * getData function.
     *
     * Reurns requested page from data_url
     * 
     * @access public
     * @return string
     */
    public function getData() {

        $scraper = new Scraper($this->data_url);
        $table = $scraper->scrape()->match('/(<table class=\'ppst\'>.*?<\/table>)/s');

        $rows = $scraper->matchAll('/<tr(.*?)<\/tr>/s', $table);

        $data = array();
        foreach($rows as $k => $row) {
            
            if ($k > 1) {

                $d = $scraper->matchAll('/<td.*?>&nbsp;(.*?)&nbsp;<\/td>/s', $row);
                $data[] = array(
                    $this->id,
                    '2013-04-19', //batch number is the date
                    '', // no obs_id
                    $d[4],
                    $this->dateToTimestamp($d[0]),
                    $this->dateToTimestamp($d[1]),
                    $d[5],
                    $d[6],
                    '' // no notes
                );

            }

        }

        return $data;

    }

    /**
     * determineBatchId function.
     *
     * Determines the batch last batch id from the data_url page
     * 
     * @access public
     * @return string
     */
    public function determineBatchId() {

    }

    /**
     * updateData function.
     *
     * Updates the telescope events data with new data from data_url page
     * 
     * @access public
     * @return void
     */
    public function updateData() {

    }

    private function dateToTimestamp($date) {

        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $date, new \DateTimeZone('UTC'));
        return $date->format('U');

    }

}