<?php

namespace Frontend\Controller;

use Blueprint\Controller\Controller;
use Frontend\Model;
use Frontend\View;

/**
 * Importer class.
 * 
 * @extends Controller
 */
class Importer extends Controller {

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

        $this->import_model = new Model\Importer();
        $this->import_model->setContainer($this->container);
    
    }

    /**
     * indexAction function.
     * 
     * @access public
     * @return void
     */
    public function indexAction() {
        
        $vars['content'] = 'Importer';
        echo $this->view->render("index.php", $vars);
    
    }

    /**
     * testDataAction function.
     * 
     * @access public
     * @param id integer
     * @return void
     */
    public function importAction($id) {
        
        $vars['content'] = $this->import_model->import($id);
        echo $this->view->render("index.php", $vars);
    
    }

}