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
 * HerschelTelescope class.
 *
 * @package telescopeschedules
 * @extends Telescope 
 * @author Christopher Briggs <chris@jooldesign.co.uk>
 */
class HerschelTelescope extends Telescope {
    
    /**
     * id
     *
     * id of the telescope in the DB
     * 
     * @var mixed
     * @access protected
     */
    private $id = 9;

    /**
     * data_url
     *
     * url to scrape new data from
     * 
     * @var mixed
     * @access protected
     */
    private $data_url = 'http://herschel.esac.esa.int/observing/ScheduleReport.html';

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
        return $scraper->scrape()->match('/(<table.*?<\/table>)/s');

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