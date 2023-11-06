<?php

require_once 'Models/Connect.php';

class Category_Object
{
    private int $ID;
    private string $CategoryName;

    public function __construct($ID, $CategoryName)
    {
        $this->ID = $ID;
        $this->CategoryName = $CategoryName;
    }

    public function get_ID(){
        return $this->ID;
    }

    public function get_CategoryName(){
        return $this->CategoryName;
    }

    public function set_ID($var){
        return $this->ID = $var;
    }

    public function set_CategoryName($var){
        return $this->CategoryName = $var;
    }
}