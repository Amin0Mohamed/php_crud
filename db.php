<?php

class DB{

    private $server_name='localhost';
    private $user_name='root';
    private $password='';
    private $db='task';
    private $con;

    public function __construct()
    {
        $this->con=mysqli_connect($this->server_name,$this->user_name,$this->password,$this->db);
        if (!$this->con){
            die("error connect :".mysqli_connect_error());
        }
    }

    public function getCon(){
        return $this->con;
    }

    public function insert($query)
    {
        if (mysqli_query($this->con,$query)){
            return "Add Successfully";
        }else{
            die('error :'.mysqli_error($this->con));
        }
    }
    public function read($table)
    {
        $query = "SELECT * FROM $table";
        $result = mysqli_query($this->con,$query);
        $data=[];
        if ($result){
            if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $data[]=$row;
                }
            }
            return $data;
        }else{
            die('error :'.mysqli_error($this->con));
        }

    }

    public function update($query)
    {
        if (mysqli_query($this->con,$query)){
            return "update Successfully";
        }else{
            die('error :'.mysqli_error($this->con));
        }
    }
    public function delete($id)
    {
        $query="DELETE FROM `amin` WHERE `id`=$id";
        if (mysqli_query($this->con,$query)){
            return "deleted Successfully";
        }else{
            die('error :'.mysqli_error($this->con));
        }
    }

    public function enc_password($pass)
    {
        return sha1($pass);
    }

    function CloseCon($conn)
    {
        $this->con -> close();
    }
}




