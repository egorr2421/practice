<?php
include "animal.php";
abstract class Humen implements animal
{

    const RECE = "white";
    protected $name;
    protected $age;
    protected $leng;
    protected static $matherlend;
    public static function getMatherlend()
    {
        return self::$matherlend;
    }

    public static function setMatherlend($matherlend)
    {
        self::$matherlend = $matherlend;
    }

    public function __construct()
    {
    }

    public function __toString()
    {

        return $this->toString ();
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age): void
    {
        $this->age = $age;
    }

    public function getLeng()
    {
        return $this->leng;
    }

    public function setLeng($leng): void
    {
        $this->leng = $leng;
    }
    public function toString()
    {
        return "name-{$this->name}   age-{$this->age}   leng-{$this->getLeng()} matherlend-{$this->getMatherlend()}";
    }

    abstract public function hello();
    public function ji(){
        return "yi2";
    }
}
echo "sad";