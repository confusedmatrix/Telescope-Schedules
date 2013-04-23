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

        /*$this->wavelength = new FormField('select', 'wavelength', 'Wavelength');
        $this->wavelength->setAttr('id', 'wavelength');
        $this->wavelength->setOption('all', 'All');
        $this->wavelength->setOption('gamma', 'Gamma');
        $this->wavelength->setOption('x-ray', 'X-ray');
        $this->wavelength->setOption('uv', 'Ultra Violet');
        $this->wavelength->setOption('visible', 'Visible');
        $this->wavelength->setOption('infrared', 'Infrared');*/
    
        $this->start_date = new FormField('date', 'start_date', 'Start date');
        $this->start_date->setAttr('id', 'start_date');
        $this->start_date->setValue(date('Y-m-d', time() - (60*60*24*7)));
        
        $this->end_date = new FormField('date', 'end_date', 'End date');
        $this->end_date->setAttr('id', 'end_date');
        $this->end_date->setValue(date('Y-m-d', time()));
    
    }

}