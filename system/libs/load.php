<?php


class Load
{
    function __construct(){}

    public function view($fileName, $data = NULL)
    {
        if ($data != NULL) {
            extract($data);
        }

        include 'app/views/' . $fileName . '.php';
    }

    public function model($fileName)
    {
        include 'app/models/' . $fileName . '.php';
        return new $fileName();
    }
}
