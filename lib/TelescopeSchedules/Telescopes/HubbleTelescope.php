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
 * HubbleTelescope class.
 *
 * @package telescopeschedules
 * @extends Telescope 
 * @author Christopher Briggs <chris@jooldesign.co.uk>
 */
class HubbleTelescope extends Telescope {
    
    /**
     * id
     *
     * id of the telescope in the DB
     * 
     * @var mixed
     * @access protected
     */
    private $id = 8;

    /**
     * data_url
     *
     * url to scrape new data from
     * 
     * @var mixed
     * @access protected
     */
    private $data_url = 'http://www.stsci.edu/observing/phase2-public/12177.pro';

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
        return $scraper->scrape()->match('/(TARGET LIST.*?)Visit/s');

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