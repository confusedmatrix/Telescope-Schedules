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
    private $data_url = 'http://integral.esac.esa.int/isocweb/schedule.html?action=schedule&startRevno={0}&endRevno={1}&reverseSort=&format=csv';

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

        $this->data_url = str_replace(array('{0}', '{1}'), array($batch, $this->determineLastBatchId()), $this->data_url);

        $scraper = new Scraper($this->data_url);
        $table = $scraper->scrape()->match('/(.*)/s');

        $rows = explode("\n", $table);

        $data = array();
        foreach($rows as $k => $row) {
            
            if ($k > 0 && $k < count($rows)-1) {
            
                $d = str_getcsv($row);
                $data[] = array(
                    'telescope_id'  => $this->id,
                    'batch'         => $d[0],
                    'obs_id'        => $d[10],
                    'obs_target'    => $d[4],
                    'start'         => $this->dateToTimestamp($d[1]),
                    'end'           => $this->dateToTimestamp($d[2]),
                    'obs_ra'        => $d[5],
                    'obs_decl'      => $d[6],
                    'notes'         => 'http://integral.esac.esa.int/isocweb/schedule.html?action=proposal&id=' . $d[9]
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

        $url = 'http://integral.esac.esa.int/isocweb/schedule.html?action=schedule';
        $scraper = new Scraper($url);
        return $scraper->scrape()->match('/Schedule for current revolution \((.*?)\)/s');

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