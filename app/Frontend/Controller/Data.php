<?php

namespace Frontend\Controller;

use Blueprint\Controller\Controller;
use Frontend\Model;
use Frontend\View;

/**
 * Data class.
 * 
 * @extends Controller
 */
class Data extends Controller {

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {
        
        $this->view = new View\Index();
        
    }
    
    /**
     * setContainer function.
     * 
     * @access public
     * @param mixed $container
     * @return void
     */
    public function setContainer($container) {
    
        parent::setContainer($container);
        
        $this->view->setContainer($this->container);

        $this->telescopes = new Model\Telescopes();
        $this->telescopes->setContainer($this->container);

        $this->telescope_events = new Model\TelescopeEvents();
        $this->telescope_events->setContainer($this->container);

        header('Content-type: application/json; charset=utf-8');
    
    }

    /**
     * telescopesAction function.
     * 
     * @access public
     * @param id integer
     * @return void
     */
    public function telescopesAction() {
        
        $vars['content'] = json_encode($this->telescopes->getRows());
        echo $this->view->render("ajax.php", $vars);
    
    }

    /**
     * telescopeEventsAction function.
     * 
     * @access public
     * @param id integer
     * @return void
     */
    public function telescopeEventsAction($start, $end) {
        
        $json = array(
            'telescopes' => $this->telescopes->getRows(
                array(
                    'select' => array('id', 'name', 'wavelengths'),
                    'where' => array(array('status', '=', 1))
                )
            ),
            'events'     => $this->telescope_events->getRows(
                array(
                    'select' => array('telescope_id', 'obs_target', 'start', 'end', 'obs_ra', 'obs_decl', 'notes'),
                    'joins' => 'INNER JOIN telescopes ON telescopes.id = telescope_events.telescope_id', 
                    'where' => array(
                        array('status', '=', 1),
                        array(
                            array('start', '>=', $start),
                            array('end', '>=', $end)
                        ),
                        array(
                            array('start', '<', $start),
                            array('end', '<', $end)  
                        )
                    )
                )
            )
        );

        $vars['content'] = json_encode($json);
        echo $this->view->render("ajax.php", $vars);
    
    }

}