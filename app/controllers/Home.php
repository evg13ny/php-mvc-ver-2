<?php

namespace Controller;

defined("ROOTPATH") or exit("Access denied");

class Home
{
    use MainController;

    public function index()
    {
        echo "This is home controller";

        $this->view("home");
    }
}
