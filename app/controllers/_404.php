<?php

namespace Controller;

defined("ROOTPATH") or exit("Access denied");

class _404
{
    use MainController;

    public function index()
    {
        echo "This is 404 page not found controller";

        $this->view("404");
    }
}
