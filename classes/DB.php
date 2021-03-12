<?php


class DB
{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function connect() {
        $this->servername="localhost";
        $this->username="root";
        $this->password="";
        $this->dbname="emails";
        $conn=mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
        if (mysqli_connect_error()) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }
    protected function query($sql) {
        if (!$conn=$this->connect()) {
            die("Connection failed!");
        }
        $result=$conn->query($sql);
        if ($result === FALSE) { // query failed
            die("Server error!");
        }
        else if($result === TRUE) { // query is not a select
            $id=$conn->insert_id;
            $conn->close();
            return $id;
        }
        else { // query is a select
            $data=array();
            while($row=$result->fetch_assoc()) {
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }
    protected function escapeString($string) {
        if (!$conn=$this->connect()) {
            die("Connection failed!");
        }
        $s=mysqli_real_escape_string($conn,$string);
        $conn->close();
        return $s;
    }
}