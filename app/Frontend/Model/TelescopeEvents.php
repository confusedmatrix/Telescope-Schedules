<?php

namespace Frontend\Model;

use Blueprint\Model\Model;

/**
 * TelescopeEvents class.
 * 
 * @extends Model
 */
class TelescopeEvents extends Model {

    /**
     * table
     * 
     * @var string
     * @access public
     */
    public $table = 'telescope_events';
    
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

    /**
     * getRowsByDate function.
     * 
     * @access public
     * @return void
     */
    public function getRowsByDate($start, $end) {
        
        $sql = 'SELECT telescope_id, obs_target, start, end, obs_ra, obs_decl, notes 
                FROM ' . $this->table . '
                INNER JOIN telescopes ON telescopes.id = telescope_events.telescope_id
                WHERE status = ? 
                AND (start >= ? AND start < ?) 
                 OR (end >= ? AND end < ?) 
                 OR (start < ? AND end > ?)';

        $q = $this->database->prepare($sql);
        $q->execute(array(1, $start, $end, $start, $end, $start, $end));
        
        $data = array();
        while ($result = $q->fetch(\PDO::FETCH_ASSOC)) {
            
            $array = array();
            foreach ($result as $key => $val) {
               
                $array[$key] = $val;
                
            }        
                
            $data[] = $array;
        
        }
                    
        if (!empty($data))
            return $data;
        
        return array();
    
    }

    /**
     * add function.
     * 
     * @access public
     * @param data
     * @return void
     */
    public function add($data) {
    
        $this->database->insert($this->table, $data);
    
    }
    
}