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
            
        $this->model = new Model\Data();
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
        
        $this->model->setContainer($this->container);
        $this->view->setContainer($this->container);

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
        
        $vars['content'] = $this->model->getTelescopesAsJSON();
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
        
        $vars['content'] = $this->model->getTelescopeEventsAsJSON($start, $end);
        echo $this->view->render("ajax.php", $vars);
    
    }

}