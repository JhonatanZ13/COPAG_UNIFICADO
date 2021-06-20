<?php

    include_once '../lib/conf/connection.php';

    class MasterModel extends Connection{

        public function insert($sql){
            $result=mysqli_query($this->getConnect(),$sql);
            return $result;
        }
        public function update($sql){
            $result=mysqli_query($this->getConnect(),$sql);
            return $result;
        }
        public function delete($sql){
            $result=mysqli_query($this->getConnect(),$sql);
            return $result;
        }
        public function consult($sql){
            $result=mysqli_query($this->getConnect(),$sql);
            return $result;
        }
        public function autoIncrement($table,$field){
            $sql="SELECT MAX($field) FROM $table";
            $result=$this->consult($sql);
            $account=mysqli_fetch_row($result);

            return end($account)+1;
        }
    }
?>