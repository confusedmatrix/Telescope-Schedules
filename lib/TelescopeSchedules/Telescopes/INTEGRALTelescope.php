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
 * INTEGRALTelescope class.
 *
 * @package telescopeschedules
 * @extends Telescope 
 * @author Christopher Briggs <chris@jooldesign.co.uk>
 */
class INTEGRALTelescope extends Telescope {
    
    /**
     * id
     *
     * id of the telescope in the DB
     * 
     * @var mixed
     * @access protected
     */
    private $id = 2;

    /**
     * data_url
     *
     * url to scrape new data from
     * 
     * @var mixed
     * @access protected
     */
    private $data_url = 'http://integral.esac.esa.int/isocweb/schedule.html?action=schedule&startRevno=1284&endRevno=1284&reverseSort=&format=csv';

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
            
            if ($k > 0 && $k < count($rows)-1) {
            
                $d = str_getcsv($row);
                $data[] = array(
                    $this->id,
                    $d[0],
                    $d[10],
                    $d[4],
                    $this->dateToTimestamp($d[1]),
                    $this->dateToTimestamp($d[2]),
                    $d[5],
                    $d[6],
                    'http://integral.esac.esa.int/isocweb/schedule.html?action=proposal&id=' . $d[9]
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

        $date = \DateTime::createFromFormat('Y-m-d H:i:s.u', $date, new \DateTimeZone('UTC'));
        return $date->format('U');

    }

}