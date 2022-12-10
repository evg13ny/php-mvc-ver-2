<?php

/** Session class - saves or reads data from the current session */

namespace Core;

defined("ROOTPATH") or exit("Access denied");

class Session
{
    public $mainKey = 'APP';
    public $userKey = 'USER';

    /** starts session */
    private function start_session(): int
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return 1;
    }


    /** puts data into the session */
    public function set(mixed $keyOrArray, mixed $value = ''): int
    {
        $this->start_session();

        if (is_array($keyOrArray)) {
            foreach ($keyOrArray as $key => $value) {
                $_SESSION[$this->mainKey][$key] = $value;
            }

            return 1;
        }

        $_SESSION[$this->mainKey][$keyOrArray] = $value;

        return 1;
    }


    /** gets data from the session, returns default if data not found */
    public function get(string $key, mixed $default = ''): mixed
    {
        $this->start_session();

        if (isset($_SESSION[$this->mainKey][$key])) {
            return $_SESSION[$this->mainKey][$key];
        }

        return $default;
    }


    /** saves the user into the session after login */
    public function auth(mixed $user_row): int
    {
        $this->start_session();

        $_SESSION[$this->userKey] = $user_row;

        return 0;
    }


    /** removes user data from the session after logout */
    public function logout(): int
    {
        $this->start_session();

        if (!empty($_SESSION[$this->userKey])) {
            unset($_SESSION[$this->userKey]);
        }

        return 0;
    }


    /** checks if user is logged in */
    public function is_logged_in(): bool
    {
        $this->start_session();

        if (!empty($_SESSION[$this->userKey])) {
            return true;
        }

        return false;
    }


    /** gets data from a column */
    public function user(string $key = '', mixed $default = ''): mixed
    {
        $this->start_session();

        if (empty($key) && !empty($_SESSION[$this->userKey])) {
            return $_SESSION[$this->userKey];
        } elseif (!empty($_SESSION[$this->userKey]->$key)) {
            return $_SESSION[$this->userKey]->$key;
        }

        return $default;
    }


    /** returns data from a key and deletes it */
    public function pop(string $key, mixed $default = ''): mixed
    {
        $this->start_session();

        if (!empty($_SESSION[$this->mainKey][$key])) {
            $value = $_SESSION[$this->mainKey][$key];
            unset($_SESSION[$this->mainKey][$key]);
            return $value;
        }

        return $default;
    }


    /** returns all data from the session */
    public function all(): mixed
    {
        $this->start_session();

        if (isset($_SESSION[$this->mainKey])) {
            return $_SESSION[$this->mainKey];
        }

        return [];
    }
}
