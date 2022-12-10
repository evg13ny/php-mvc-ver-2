<?php

/** Request class - gets and sets data in the POST and GET global variables */

namespace Core;

defined('ROOTPATH') or exit('Access Denied!');

class Request
{
    /** checks which post method is used */
    public function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }


    /** checks if something was posted */
    public function posted(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && count($_POST) > 0) return true;

        return false;
    }


    /** gets value from the POST variable */
    public function post(string $key = '', mixed $default = ''): mixed
    {
        if (empty($key)) {
            return $_POST;
        } elseif (isset($_POST[$key])) {
            return $_POST[$key];
        }

        return $default;
    }


    /** gets value from the FILES variable */
    public function files(string $key = '', mixed $default = ''): mixed
    {
        if (empty($key)) {
            return $_FILES;
        } elseif (isset($_FILES[$key])) {
            return $_FILES[$key];
        }

        return $default;
    }


    /** gets value from the GET variable */
    public function get(string $key = '', mixed $default = ''): mixed
    {
        if (empty($key)) {
            return $_GET;
        } elseif (isset($_GET[$key])) {
            return $_GET[$key];
        }

        return $default;
    }


    /** gets value from the REQUEST variable */
    public function input(string $key, mixed $default = ''): mixed
    {
        if (isset($_REQUEST[$key])) return $_REQUEST[$key];

        return $default;
    }


    /** gets all values from the REQUEST variable */
    public function all(): mixed
    {
        return $_REQUEST;
    }
}
