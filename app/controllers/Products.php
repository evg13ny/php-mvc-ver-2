<?php

namespace Controller;

defined("ROOTPATH") or exit("Access denied");

class Products
{
    use MainController;

    public function index()
    {
        echo "This is products controller";

        $this->view("products");
    }
}
