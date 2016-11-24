<?php

/**
 * Created by PhpStorm.
 * User: bakikr
 * Date: 24/11/2016
 * Time: 11:54
 */

require(dirname(__DIR__)."/config.php");

class Database
{
    public static $instance = null;

    public static function getInstance() {

        if(!self::$instance) {
            try {
                self::$instance = new PDO("mysql:dbhost=".DBHOST.";dbname=".DBNAME.";charset=utf8", DBUSER, DBPASSWD,
                    array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch (PDOException $e) {
                errorHandler(0, $e->getMessage(), $e->getFile(), $e->getLine(), print_r($e, true), 'sql');
                die('SQL Error, terminating script.');
            }
        }

        return self::$instance;

    }
}