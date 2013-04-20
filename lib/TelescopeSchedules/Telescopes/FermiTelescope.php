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
     * @param batch
     * @return string
     */
    public function getData($batch=false) {

        $scraper = new Scraper($this->data_url);
        $table = $scraper->scrape()->match('/(<table id="timelineTable.*?<\/table>)/s');

        $rows = $scraper->matchAll('/<tr>\s*(<td.*?)<\/tr>/s', $table);

        $data = array();
        foreach($rows as $row) {
            
            $d = $scraper->matchAll('/<td.*?>(.*?)<\/td>/s', $row);
            $data[] = array(
                'telescope_id'  => $this->id,
                'batch'         => $d[2],
                'obs_id'        => $d[1],
                'obs_target'    => $d[10],
                'start'         => $this->dateToTimestamp($d[3]),
                'end'           => $this->dateToTimestamp($d[4]),
                'obs_ra'        => $d[6],
                'obs_decl'      => $d[7],
                'notes'         => $d[12]
            );

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

        $data = $this->getData();
        $batch = 0;
        foreach ($data as $d)
            if ($d['batch'] > $batch)
                $batch = $d['batch'];

        return $batch;

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

        $p = explode('-', $date);
        $t = explode(':', $p[2]);
        $p[1] = $p[1] == '000' ? '0' : ltrim($p[1], '0');

        $date = \DateTime::createFromFormat('Y-z-H:i:s', $p[0].'-'.$p[1].'-'.$t[0].':'.$t[1].':'.$t[2], new \DateTimeZone('UTC'));
        return $date->format('U');

    }

}