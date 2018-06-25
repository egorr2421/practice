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
}