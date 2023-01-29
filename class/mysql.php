<?php

    class Mysql{

        private static $pdo;

        public static function conectar()
        {

            if(isset(self::$pdo)){

                return self::$pdo;
            
            }else{

                if(self::$pdo == null){

                    self::$pdo = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASSWORD);
            

                }

                return self::$pdo;

            }

        }

    }

?>