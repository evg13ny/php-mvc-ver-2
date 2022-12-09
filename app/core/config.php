<?php

defined("ROOTPATH") or exit("Access denied");

if ($_SERVER["SERVER_NAME"] == "localhost") {
    define("DBNAME", "php-mvc_test_db");
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");

    define("ROOT", "http://localhost/php-mvc/public");
} else {
    define("DBNAME", "php-mvc_test_db");
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");

    define("ROOT", "https://www.yourwebsite.com");
}

define("APP_NAME", "My Website");

/** true means show errors */
define("DEBUG", true);
