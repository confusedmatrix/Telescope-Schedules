<?php

namespace Frontend\Controller;

use Blueprint\Controller\Controller;
use Frontend\View;
use Frontend\Form\Data\DataFilterForm;

/**
 * Index class.
 * 
 * @extends Controller
 */
class Index extends Controller {

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
    
    }

    /**
     * indexAction function.
     * 
     * @access public
     * @return void
     */
    public function indexAction() {
        
        $this->page->body_id = 'home';
        $this->page->h1 = 'Telescope Schedules <small>Discover what the world\'s telescopes are observing...</small>';

        $form = new DataFilterForm();
        $vars['data_controls'] = $form->render();
        echo $this->view->render('home.php', $vars);
    
    }

}