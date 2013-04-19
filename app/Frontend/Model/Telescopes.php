<?php

namespace Frontend\Model;

use Blueprint\Model\Model;

/**
 * Telescopes class.
 * 
 * @extends Model
 */
class Telescopes extends Model {

    /**
     * table
     * 
     * @var string
     * @access public
     */
    public $table = 'telescopes';
    
    /**
     * primary_key
     * 
     * @var string
     * @access public
     */
    public $primary_key = 'id';

    /**
     * setContainer function.
     * 
     * @access public
     * @param mixed $container
     * @return void
     */
    public function setContainer($container) {
    
        parent::setContainer($container);
        
        $this->database = $this->container->get('database');
        $this->request = $this->container->get('request');
    
    }
    
    /**
     * getRow function.
     * 
     * @access public
     * @param mixed $id
     * @param array $opts (default: array())
     * @return void
     */
    public function getRow($id, $opts=array()) {
    
        $options = array(            
            
            'table'     => $this->table,
            'select'    => array('*'),
            'where'     => array(
                array(
                    $this->primary_key,
                    '=',
                    $id
                )
            )
        
        );
        
        $options = array_merge($options, $opts);
        $row = $this->database->fetchRow($options);
        
        return $row;
    
    }
    
    /**
     * getRows function.
     * 
     * @access public
     * @param array $opts (default: array())
     * @return void
     */
    public function getRows($opts=array()) {
        
        $options = array(
                
            'table'     => $this->table,
            'select'    => array('*')
                
        );
        
        $options = array_merge($options, $opts);
        $rows = $this->database->fetchRows($options);
            
        return $rows;
    
    }
    
}