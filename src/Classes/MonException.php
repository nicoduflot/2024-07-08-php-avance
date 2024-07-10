<?php
namespace App;

class MonException extends \Exception{
    private $toto;
    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
        $this->toto = $code;
    }

    public function __toString()
    {
        return $this->getMessage();
    }
}