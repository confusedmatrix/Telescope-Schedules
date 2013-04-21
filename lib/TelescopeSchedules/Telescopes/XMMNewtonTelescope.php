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
    private $data_url = 'http://xmm2.esac.esa.int/cgi-bin/obs_search/selectobs?prpobs=&revn={0}';

    /**
     * getData function.
     *
     * Reurns requested page from data_url
     * 
     * @access public
     * @return string
     */
    public function getData($batch) {

        $last_batch = $this->determineLastBatchId();

        $data = array();
        $c = -1;
        while ($batch <= $last_batch) {

            $data_url = str_replace('{0}', $batch, $this->data_url);

            $scraper = new Scraper($data_url);
            $table = $scraper->scrape()->match('/(<TABLE BORDER="2".*?<\/TABLE>)/s');

            $rows = $scraper->matchAll('/<TR.*?>\s*(<TD.*?)<\/TR>/s', $table);

            foreach ($rows as $row) {
                
                if (strstr($row, '<TD COLSPAN="7" ALIGN="CENTER">')) {

                    $c++;

                    $data[$c][] = $batch;
                    $data[$c][] = $scraper->match('/<FONT.*?>\s+(.*?)\s+<\/FONT>/s', $row);

                } elseif (strstr($row, '<TD ALIGN="CENTER"> <B>')) {

                    $fields = $scraper->matchAll('/<B>\s+(.*?)\s+<\/B>/s', $row);
                    foreach($fields as $field)
                        $data[$c][] = $field;

                }

            }

            $batch++;

        }

        foreach ($data as $k => $d) {

            $data[$k] = array(
                'telescope_id'  => $this->id,
                'batch'         => $d[0],
                'obs_id'        => $d[1],
                'obs_target'    => $d[2],
                'start'         => $this->dateToTimestamp($d[7]),
                'end'           => $this->dateToTimestamp($d[8]),
                'obs_ra'        => $d[3],
                'obs_decl'      => $d[4],
                'notes'         => ''
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

        $scraper = new Scraper('http://xmm2.esac.esa.int/cgi-bin/obs_search/selectobs');
        return $scraper->scrape()->match('/Please select a Proposal, an Observation or a Revolution \(0014 - (.*?)\)/');

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