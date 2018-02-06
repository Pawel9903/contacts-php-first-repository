<?php
class Config {

    public $host;
    public $dbname;
    public $charset;
    public $username;
    public $password;
    function __construct($host,$dbname,$charset,$username,$password){
    $this->host = $host;
    $this->dbname = $dbname;
    $this->charset = $charset;
    $this->username = $username;
    $this->password = $password;
    }
}