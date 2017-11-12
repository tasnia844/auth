<?php
class Db {
  public static function connection ($config) {
    return new PDO($config['dsn'],$config['user'], $config['password'], $config['options']  );
  }
}

