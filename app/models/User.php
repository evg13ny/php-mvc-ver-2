<?php

namespace Model;

defined("ROOTPATH") or exit("Access denied");

class User
{
    use Model;

    protected $table = "users";

    protected $allowedColumns = [
        "name",
        "age",
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data["email"])) {
            $this->errors["email"] = "Email is required";
        } elseif (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            $this->errors["email"] = "Email is not valid";
        }

        if (empty($data["password"])) {
            $this->errors["password"] = "Password is required";
        }

        if (empty($data["terms"])) {
            $this->errors["terms"] = "You must accept the terms";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}
