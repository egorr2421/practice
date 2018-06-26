<?php
/**
 * Created by PhpStorm.
 * User: Egor
 * Date: 24.06.2018
 * Time: 13:59
 */

namespace application\model;


class Account  extends \Model
{
    public function ChekUser($name,$email,$pass = 0 ){
       $users = $this->db->query ("SELECT * FROM accounts");

       foreach ($users as $user){

           if($pass!=0) {
               if(mb_strtolower($user['login']) == mb_strtolower($name) and password_verify ($pass,$user['passwd'])){
                   return true;
               }
           }else{
           if(mb_strtolower($user['login']) == mb_strtolower($name) or mb_strtolower($user['Email']) == mb_strtolower($email)){
                return true;
           }
               }
       }
        return false;
    }
    public function RegisterUser($name,$email,$pass){
       $this->db->query ( "INSERT INTO accounts(`login`, `passwd`, `Email`) VALUES ('".$name."','".password_hash($pass,PASSWORD_DEFAULT)."','".$email."')");
    }
    public function getUser($name){
        return $this->db->query( "SELECT * FROM accounts where login = '$name'");
    }
    public function getNewsForPer($id){
        return $this->db->query ("SELECT * FROM `news` WHERE autor = (SELECT id FROM accounts WHERE id=$id)");
    }
    public function RegisterPost($title,$des,$autor,$id_cat,$data){
        return $this->db->query ( "INSERT INTO news(`Title`, `description`, `autor`, `id_cat` ,`Date_cr`) VALUES ('".$title."','".$des."','".$autor."','".$id_cat."','".$data."')");
    }
    public function addCats($id){
        return $this->db->query ( "UPDATE `category` SET `amount`=`amount`+1 WHERE id=$id");
    }
    public function dellnews($id){
        $this->db->query ( "UPDATE `category` SET `amount`=`amount`-1 WHERE id= (SELECT id_cat from `news` where id=$id)");
        return $this->db->query ( "DELETE from `news` WHERE  id=$id");

    }
    public function updatenews($id,$tytle,$cat,$text){
        return $this->db->query ( "UPDATE `news` SET `Title`= '".$tytle."' , `id_cat`= '".$cat."' ,`description`= '".$text."'  WHERE id= $id");

    }
}