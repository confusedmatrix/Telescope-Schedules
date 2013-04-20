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
 * NuStarTelescope class.
 *
 * @package telescopeschedules
 * @extends Telescope 
 * @author Christopher Briggs <chris@jooldesign.co.uk>
 */
class NuStarTelescope extends Telescope {
    
    /**
     * id
     *
     * id of the telescope in the DB
     * 
     * @var mixed
     * @access protected
     */
    private $id = 5;

    /**
     * data_url
     *
     * url to scrape new data from
     * 
     * @var mixed
     * @access protected
     */
    private $data_url = 'http://www.srl.caltech.edu/NuSTAR_Public/NuSTAROperationSite/Download.php?file=sr-schedule.txt&send_file=yes';

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
        $table = $scraper->scrape()->match('/(.*)/s');

        $rows = explode("\n", $table);

        $data = array();
        foreach($rows as $k => $row) {
            
            if ($k > 12 && $k < count($rows)-1) {
                
                $d = preg_split('/\s+/', $row, 8);
                $data[] = array(
                    $this->id,
                    '2013-01-15', // batch number from page
                    $d[2],
                    $d[3],
                    $this->dateToTimestamp($d[0]),
                    $this->dateToTimestamp($d[1]),
                    $d[4],
                    $d[5],
                    $d[7]
                );

            }

        }

        // N.B Last field may be split across multiple fields if there is space involved
        // Solution: concatenate 7th key onwards

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

        $date = \DateTime::createFromFormat('Y:z:H:i:s', $date, new \DateTimeZone('UTC'));
        return !empty($date) ? $date->format('U') : 'date error';

    }

}