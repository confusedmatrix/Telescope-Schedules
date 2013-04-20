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
 * XMMNewtonTelescope class.
 *
 * @package telescopeschedules
 * @extends Telescope 
 * @author Christopher Briggs <chris@jooldesign.co.uk>
 */
class XMMNewtonTelescope extends Telescope {
    
    /**
     * id
     *
     * id of the telescope in the DB
     * 
     * @var mixed
     * @access protected
     */
    private $id = 7;

    /**
     * data_url
     *
     * url to scrape new data from
     * 
     * @var mixed
     * @access protected
     */
    private $data_url = 'http://xmm2.esac.esa.int/cgi-bin/obs_search/selectobs?prpobs=&revn=2455';

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
        $table = $scraper->scrape()->match('/(<TABLE BORDER="2".*?<\/TABLE>)/s');

        $rows = $scraper->matchAll('/<TR.*?>\s*(<TD.*?)<\/TR>/s', $table);

        $data = array();
        $d = array();
        $c = -1;
        foreach($rows as $row) {
            
            if (strstr($row, '<TD COLSPAN="7" ALIGN="CENTER">')) {

                $d = array();
                $c++;

                $data[$c][] = $scraper->match('/<FONT.*?>\s+(.*?)\s+<\/FONT>/s', $row);

            } elseif (strstr($row, '<TD ALIGN="CENTER"> <B>')) {

                $fields = $scraper->matchAll('/<B>\s+(.*?)\s+<\/B>/s', $row);
                foreach($fields as $field)
                    $data[$c][] = $field;

            }

        }

        foreach ($data as $k => $d) {

            $data[$k] = array(
                $this->id,
                '2455', // batch number from page
                $d[0],
                $d[1],
                $this->dateToTimestamp($d[6]),
                $this->dateToTimestamp($d[7]),
                $d[2],
                $d[3]
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

        $date = \DateTime::createFromFormat('Y-m-d@H:i:s', $date, new \DateTimeZone('UTC'));
        return !empty($date) ? $date->format('U') : 'date error';

    }

}