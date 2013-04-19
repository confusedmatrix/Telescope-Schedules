<?php

namespace Frontend\Controller;

use Blueprint\Controller\Controller;
use Frontend\Model;
use Frontend\View;

/**
 * Testing class.
 * 
 * @extends Controller
 */
class Testing extends Controller {

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
        
        $this->page = $this->container->get('page');
        
        $this->view->setContainer($this->container);

        $this->testing_model = new Model\Testing();
        $this->testing_model->setContainer($this->container);
    
    }

    /**
     * indexAction function.
     * 
     * @access public
     * @return void
     */
    public function indexAction() {
        
        $vars['content'] = 'Test area';
        echo $this->view->render("index.php", $vars);
    
    }

    /**
     * testDataAction function.
     * 
     * @access public
     * @param id integer
     * @return void
     */
    public function testDataAction($id) {
        
        $vars['content'] = $this->testing_model->scrapeData($id);
        echo $this->view->render("index.php", $vars);
    
    }

}