<?php
namespace Eightpockets\Web\Model;

class DatabaseHandler
{
    public static function init(){

        $hostname = 'db';
        $port     = '3306';
        $dbname   = 'slimapp';
        $username = 'root';
        $password = 'root';

        try {
            $pdo = new \PDO("mysql:dbname=$dbname;host=$hostname;port=$port;charset=utf8",$username,$password,
                   array(\PDO::ATTR_EMULATE_PREPARES => false)
            );
            //$app->logger->info('Error! Can not MySQL DataBase Connection :'.$e->getMessage());
            return $pdo;

        } catch (\PDOException $e) {
             var_dump('Error! Can not MySQL DataBase Connection :'.$e->getMessage());
        }
    }
}
