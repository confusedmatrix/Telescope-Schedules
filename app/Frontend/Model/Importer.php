<?php

namespace Frontend\Model;

use Blueprint\Model\Model;

/**
 * Importer class.
 * 
 * @extends Model
 */
class Importer extends Model {

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

        $this->telescope_events = new TelescopeEvents();
        $this->telescope_events->setContainer($this->container);
    
    }

    /**
     * import function.
     * 
     * @access public
     * @param integer $id
     * @return void
     */
    public function import($id) {

        $telescope = $this->telescopes->getRow($id);

        if (!$telescope) return 'Telescope not found';

        $class_name = 'TelescopeSchedules\\Telescopes\\' . $telescope['class_name'];
        $t = new $class_name;

        $data = $t->getData($telescope['last_batch']);

        foreach ($data as $d)
            $this->telescope_events->add($d);

        return 'IMPORT COMPLETE';

    }

}