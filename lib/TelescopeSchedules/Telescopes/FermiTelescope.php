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
 * ExampleTelescope class.
 *
 * @package telescopeschedules
 * @extends Telescope 
 * @author Christopher Briggs <chris@jooldesign.co.uk>
 */
class FermiTelescope extends Telescope {
    
    /**
     * id
     *
     * id of the telescope in the DB
     * 
     * @var mixed
     * @access protected
     */
    private $id = 1;

    /**
     * data_url
     *
     * url to scrape new data from
     * 
     * @var mixed
     * @access protected
     */
    private $data_url = 'http://fermi.gsfc.nasa.gov/ssc/observations/timeline/posting/ao5/';

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
        $table = $scraper->scrape()->match('/(<table id="timelineTable.*?<\/table>)/s');

        $rows = $scraper->matchAll('/<tr>\s*(<td.*?)<\/tr>/s', $table);

        $data = array();
        foreach($rows as $row) {
            
            $d = $scraper->matchAll('/<td.*?>(.*?)<\/td>/s', $row);
            $data[] = array(
                $this->id,
                $d[2],
                $d[1],
                $d[10],
                $this->dateToTimestamp($d[3]),
                $this->dateToTimestamp($d[4]),
                $d[6],
                $d[7],
                $d[12]
            );

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

        $p = explode('-', $date);
        $t = explode(':', $p[2]);
        $p[1] = $p[1] == '000' ? '0' : ltrim($p[1], '0');

        $date = \DateTime::createFromFormat('Y-z-H:i:s', $p[0].'-'.$p[1].'-'.$t[0].':'.$t[1].':'.$t[2], new \DateTimeZone('UTC'));
        return $date->format('U');

    }

}