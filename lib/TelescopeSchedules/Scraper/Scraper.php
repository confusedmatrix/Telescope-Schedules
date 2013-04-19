<?php

/*
 * This file is part of the TelescopeSchedules package.
 *
 * (c) Christopher Briggs <chris@jooldesign.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TelescopeSchedules\Scraper;

/**
 * ExampleTelescope class.
 *
 * @package telescopeschedules
 * @author Christopher Briggs <chris@jooldesign.co.uk>
 */
class Scraper {

    private $url;
    public $data = '';
    
    public function __construct($url) {

        $this->url = $url;

    }

    public function scrape() {

        $this->data = file_get_contents($this->url);
        return $this;

    }

    public function match($regex, $data=false) {

        preg_match($regex, ($data ? $data : $this->data), $matches);
        return !empty($matches[0]) ? $matches[0] : '';
        

    }

}