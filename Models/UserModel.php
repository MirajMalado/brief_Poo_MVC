<?php

class UserModel{
    public $conn;
    
    public function __construct(){
        $this->conn = mysqli_connect( 'localhost', 'root', '', 'mvc_project' ) or die ( 'Could not connect to server' );
        
    }
    
    public function Addnew( $data ){
        foreach( $data as $value ){
            if( $value === '' ){
                return false;
            }
        }
        extract( $data );
        $password = md5( $password );
        $sql = "INSERT INTO `mvc_project`.`user` (`user_id`, `password`,) VALUES (NULL, '{$username}', '{$password}',)";
        
        $query = mysqli_query( $this->conn, $sql );
        if( mysqli_affected_rows( $this->conn ) > 0 ){
            return true;
        }
        return false;
    }
    
    public function is_user_exists( $user_name, $password ){
        $password = md5( $password );
        $sql = "SELECT * FROM `user` WHERE `user_id` = '{$id_user}' AND `password` = '{$password}'";
        
        $query = mysqli_query( $this->conn, $sql );
        if( mysqli_num_rows( $query ) > 0 ){
            return true;
        }
        return false;
    }
    
    public function is_username_exists( $user_name ){
        $sql = "SELECT * FROM `user` WHERE `user_id` = '{$id_user}'";
        $query = mysqli_query( $this->conn, $sql );
        if( mysqli_num_rows( $query ) > 0 ){
            return true;
        }
        return false;
    }
    
}