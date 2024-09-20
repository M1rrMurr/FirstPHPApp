<?php
class DbCredentials
{
    public $username;
    public $password;
    public function __construct($dir, $level = 1)
    {
        require __DIR__ . "/vendor/autoload.php";

        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        $this->username = $_ENV["DB_USERNAME"];
        $this->password = $_ENV["DB_PASSWORD"];
    }
}
