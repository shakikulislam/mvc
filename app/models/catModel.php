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
        return $this->db->Select('category');
    }

    public function getById($id){
        return $this->db->getById("category", $id);
    }

    public function insertCat($data){
        return $this->db->insert("category", $data);
    }

    public function updateCat($data, $cond){
        return $this->db->update("category", $data, $cond);
    }
}
