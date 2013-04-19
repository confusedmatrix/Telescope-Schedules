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

/**
 * Abstract Model class.
 *
 * Base class from which all other telescope classes inherit.
 * 
 * @package telescopeschedules
 * @abstract
 * @author Christopher Briggs <chris@jooldesign.co.uk>
 */
abstract class Telescope {
    
    /**
     * id
     *
     * id of the telescope in the DB
     * 
     * @var mixed
     * @access protected
     */
    private $id = 0;

    /**
     * data_url
     *
     * url to scrape new data from
     * 
     * @var mixed
     * @access protected
     */
    private $data_url = '';

    /**
     * container
     * 
     * @var mixed
     * @access protected
     */
    protected $container;
    
    /**
     * setContainer function.
     * 
     * @access public
     * @param mixed $container
     * @return void
     */
    public function setContainer($container) {
        
        $this->container = $container;

        $this->database = $this->container->get('database');

    }

    /**
     * getTelescope function.
     *
     * Returns telescope info from DB
     * 
     * @access public
     * @return mixed
     */
    public function getTelescope() {

        return $this->database->getRow($id);

    }

    /**
     * getData function.
     *
     * Reurns requested page from data_url
     * 
     * @access public
     * @return string
     */
    public function getData() {

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