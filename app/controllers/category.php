<?php

class Category extends sController{
    public function __construct()
    {
        parent::__construct();
    }


    public function list()
    {
        $data = array();
        $catModel = $this->load->model("CatModel");
        $data['cat'] = $catModel->catList();
        $this->load->view("category", $data);
    }

    public function add(){
        $this->load->view("addcategory");
    }

    public function insert()
    {
        $data = array(
            'name' => $_POST["name"],
            'title' => $_POST["title"]
        );

        $catModel = $this->load->model("CatModel");
        $result=$catModel->insertCat($data);
        
        $mdata=array();

        if ($result==1) {
            $mdata['msg']="Category added successfull";
        }
        else{
            $mdata['msg']="Category not added";
        }

        $this->load->view("addcategory", $mdata);

    }

    public function updateFrm($id){
        $catModel = $this->load->model("CatModel");
        $data = array();
        $data['getCatById']=$catModel->getById($id);
        $this->load->view("catupdate", $data);
    }


    public function update(){
        $data = array(
            'name' => $_POST["name"],
            'title' => $_POST["title"]
        );

        $cond='id='.$_POST['id'];

        $catModel = $this->load->model("CatModel");
        $result=$catModel->updateCat($data, $cond);

        $mdata=array();

        if ($result==1) {
            $mdata['msg']="Category update successfull";
        }
        else{
            $mdata['msg']="Category not update";
        }

        $this->load->view("addcategory", $mdata);
    }
}
?>