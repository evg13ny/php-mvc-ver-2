<?php

defined("ROOTPATH") or exit("Access denied");

class Home
{
    use Controller;

    public function index()
    {
        echo "This is home controller";

        $this->view("home");
    }
}
