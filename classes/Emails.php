<?php
include_once 'classes/DB.php';

abstract class Emails extends DB
{
    protected function getEmails() {
        $sql="select email,ID,date from email";
        return $this->query($sql);
    }
    protected function getEmail($id) {
        $sql="select email,date from email where ID='$id'";
        return $this->query($sql);
    }
    protected function setEmail($email) {
        $date=date("Y-m-d H:i:s");
        $email=$this->escapeString($email);
        $sql="insert into email(email,date) values('$email','$date')";
        $this->query($sql);
    }
    protected function deleteEmail($id) {
        $sql="delete from email where ID='$id'";
        $this->query($sql);
    }
}