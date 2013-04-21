<?php

namespace Frontend\Model;

use Blueprint\Model\Model;

/**
 * Testing class.
 * 
 * @extends Model
 */
class Testing extends Model {

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
    
    }

    public function scrapeData($id) {

        $telescope = $this->telescopes->getRow($id);

        if (!$telescope) return 'Telescope not found';

        $class_name = 'TelescopeSchedules\\Telescopes\\' . $telescope['class_name'];
        $t = new $class_name;

        //return $t->determineLastBatchId();
        return $t->getData(2450);

    }

}