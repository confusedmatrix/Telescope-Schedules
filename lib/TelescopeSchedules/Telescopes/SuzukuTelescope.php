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
 * SuzukuTelescope class.
 *
 * @package telescopeschedules
 * @extends Telescope 
 * @author Christopher Briggs <chris@jooldesign.co.uk>
 */
class SuzukuTelescope extends Telescope {
    
    /**
     * id
     *
     * id of the telescope in the DB
     * 
     * @var mixed
     * @access protected
     */
    private $id = 6;

    /**
     * data_url
     *
     * url to scrape new data from
     * 
     * @var mixed
     * @access protected
     */
    private $data_url = 'http://www.astro.isas.ac.jp/suzaku/schedule/shortterm/html/shortterm_2013_0422.html';

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
        $table = $scraper->scrape()->match('/(<TABLE.*?<\/TABLE>)/s');

        $rows = $scraper->matchAll('/<TR>(.*?)<\/TR>/s', $table);

        $data = array();
        foreach($rows as $k => $row)
            if ($k > 1)
                $data[] = $scraper->matchAll('/<TD.*?>(.*?)<\/TD>/s', $row);

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

}