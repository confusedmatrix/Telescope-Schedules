<?php

namespace Frontend\Model;

use Blueprint\Model\Model;

/**
 * Data class.
 * 
 * @extends Model
 */
class Data extends Model {

    /**
     * setContainer function.
     * 
     * @access public
     * @param mixed $container
     * @return void
     */
    public function setContainer($container) {
    
        parent::setContainer($container);

        $this->telescopes = new Telescopes();
        $this->telescopes->setContainer($this->container);

        $this->telescope_events = new TelescopeEvents();
        $this->telescope_events->setContainer($this->container);
    
    }

    /**
     * getTelescopesAsJSON function.
     * 
     * @access public
     * @return void
     */
    public function getTelescopesAsJSON() {

        return json_encode($this->telescopes->getRows());

    }

    /**
     * getTelescopeEventsAsJSON function.
     * 
     * @access public
     * @param start
     * @param end
     * @return void
     */
    public function getTelescopeEventsAsJSON($start, $end) {

        $json = array(
            'telescopes' => $this->telescopes->getRows(
                array(
                    'select' => array('id', 'name', 'wavelengths'),
                    'where' => array(array('status', '=', 1))
                )
            ),
            'events' => $this->telescope_events->getRowsByDate($start, $end)
        );

        return json_encode($json);

    }

}