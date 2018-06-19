<?php
include "Humen.php";
trait yi{
    public function yi(){
        return parent::getAge();
    }
}
class Student extends Humen
{
    use yi;
  public function hello()
  {
   return "i`m sudent";
  }

}