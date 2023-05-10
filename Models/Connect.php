<?php

class Connect
{
    private $host = 'localhost:3307';
    private $username = 'root';
    private $password ='';
    private $database ='lession2';
    //Lấy chuỗi connection
    private function cnt()
    {
        $connect = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        mysqli_set_charset($connect,'utf8');

        return $connect;
    }
    //Thực hiện truy vấn trả kết quả
    public function select($sql)
    {
        $connect = $this->cnt();

        $result = mysqli_query($connect,$sql);

        mysqli_close($connect);

        return $result;
    }
    //Thực hiện truy vấn không trả kết quả
    public function execute($sql)
    {
        $connect = $this->cnt();

        mysqli_query($connect,$sql);

        mysqli_close($connect);
    }
}