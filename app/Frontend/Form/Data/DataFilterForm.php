<?php

namespace Frontend\Form\Data;

use Blueprint\Form\Form;
use Blueprint\Form\FormField;
use Blueprint\Form\FormValidation;

/**
 * DataFilterForm class.
 * 
 * @extends Form
 */
class DataFilterForm extends Form {

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {
        
        parent::__construct('', 'post', array());
        
        $this->setAttr('id', 'data-controls');
        $this->buildForm();
        
    }
    
    /**
     * buildForm function.
     * 
     * @access private
     * @return void
     */
    private function buildForm() {
    
        $this->start_date = new FormField('date', 'start_date', 'Start date');
        $this->start_date->setAttr('id', 'start_date');
        $this->start_date->setValue(date('Y-m-d', time()));
        
        $this->end_date = new FormField('date', 'end_date', 'End date');
        $this->end_date->setAttr('id', 'end_date');
        $this->end_date->setValue(date('Y-m-d', time()));
    
    }

}