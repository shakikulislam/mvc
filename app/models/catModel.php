<?php

/**
 * category model
 */

class CatModel extends DbModel
{
    function __construct()
    {
        parent::__construct();
    }

    public function catList()
    {
        return $this->db->Select('catergory');
    }
}
