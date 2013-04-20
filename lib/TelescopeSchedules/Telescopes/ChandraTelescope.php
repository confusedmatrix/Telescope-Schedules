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
 * ChandraTelescope class.
 *
 * @package telescopeschedules
 * @extends Telescope 
 * @author Christopher Briggs <chris@jooldesign.co.uk>
 */
class ChandraTelescope extends Telescope {
    
    /**
     * id
     *
     * id of the telescope in the DB
     * 
     * @var mixed
     * @access protected
     */
    private $id = 4;

    /**
     * data_url
     *
     * url to scrape new data from
     * 
     * @var mixed
     * @access protected
     */
    private $data_url = 'http://cxc.harvard.edu/target_lists/stscheds/index.html';

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
        $table = $scraper->scrape()->match('/(<pre id="schedule">.*?<\/pre id="schedule">)/s');

        $rows = explode("\n", $table);

        $data = array();
        foreach($rows as $k => $row) {
            
            if ($k > 3 && $k < count($rows)-3) {
                
                $d = preg_split('/\s+(?!href|http|color)/', $row);
                $data[] = array(
                    $this->id,
                    'APR2213A', // batch number from page
                    strip_tags($d[2]),
                    $d[3],
                    $this->dateToTimestamp($d[5]),
                    $this->dateToTimestamp($d[5]) + $d[6],
                    $d[9],
                    $d[10],
                    '' // no notes
                );

            }

        }

        // N.B Be aware that if the target field has a space in it, it will be split accros multiple
        // fields. Need to check if the field after it is start date field to be fix it

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

        $date = \DateTime::createFromFormat('Y:z:H:i:s.u', $date, new \DateTimeZone('UTC'));
        return !empty($date) ? $date->format('U') : 'date error';

    }

}