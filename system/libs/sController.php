<?php

/**
 * Main Controller
 */
class sController
{

    protected $load = array();

    public function __construct()
    {
        $this->load=new Load();
    }
}
