<?php


class Index extends sController
{


    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        $this->load->view("home");
    }
}
