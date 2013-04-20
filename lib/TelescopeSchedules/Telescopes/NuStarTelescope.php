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
    public function getData($batch=false) {

        $scraper = new Scraper($this->data_url);
        $table = $scraper->scrape()->match('/(.*)/s');
        $batch = $scraper->match('/Generated on: (.*?)\s/s');

        $rows = explode("\n", $table);

        $data = array();
        foreach($rows as $k => $row) {
            
            if ($k > 12 && $k < count($rows)-1) {
                
                $d = preg_split('/\s+/', $row, 8);
                $data[] = array(
                    'telescope_id'  => $this->id,
                    'batch'         => $batch,
                    'obs_id'        => $d[2],
                    'obs_target'    => $d[3],
                    'start'         => $this->dateToTimestamp($d[0]),
                    'end'           => $this->dateToTimestamp($d[1]),
                    'obs_ra'        => $d[4],
                    'obs_decl'      => $d[5],
                    'notes'         => $d[7]
                );

            }

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

        $scraper = new Scraper($this->data_url);
        return $scraper->scrape()->match('/Generated on: (.*?)\s/s');

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

        $date = \DateTime::createFromFormat('Y:z:H:i:s', $date, new \DateTimeZone('UTC'));
        return !empty($date) ? $date->format('U') : 'date error';

    }

}