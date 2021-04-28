<?php
  header('Content-type: text/html; charset=utf-8');
  /* В нашей вселенной у людей изначально 100ед. здоровья */
  /* В нашей вселенной у людей не может быть больше 100ед. здоровья*/
  /*
    Создать дедушку по маминой линии
    Создать бабушку по папиной линии
    Создать дедушку по папиной линии
    Доработать getInfo так, чтобы метод выводил всю информацию про бабушек и дедушек.
  */
  class Person{
    private $name;
    private $age;
    private $hp;
    private $mother;
    private $father;
    
    function __construct($name,$age,$mother,$father){
      $this->name = $name;
      $this->age = $age;
      $this->hp = 100;
      $this->mother = $mother;
      $this->father = $father;
    }
    
    function getMother(){return $this->mother;}
    /**/
    function getFather(){return $this->father;}
    /**/
    
    function getName(){return $this->name;}
    function sayHi($name){
      echo "Привет $name, меня зовут ".$this->name;
    }
    function getHp(){return $this->hp."ед.";}
    function setHp($hp){
      if($this->hp + $hp >= 100) $this->hp = 100;
      else $this->hp = $this->hp + $hp;
    }
    function getInfo(){
      $info = "Привет, меня зовут ".$this->name."<br>
              Мне ".$this->age." лет<br>";
      if($this->mother != null){
        $info .= "Мою маму зовут ".$this->mother->getName()."<br>";
        if($this->mother->getMother() != null){
          $info .= "Бабушку по маминой линии зовут ".$this->mother->getMother()->getName()."<br>";
          /**/
          $info .= "Дедушку по маминой линии зовут ".$this->mother->getFather()->getName()."<br>";
          /**/
        }
      }
      if($this->father != null){
        $info .= "Моего папу зовут ".$this->father->getName()."<br>";/**/
        /**/
        if($this->mother->getMother() != null){
          $info .= "Бабушку по папиной линии зовут ".$this->father->getMother()->getName()."<br>";
          $info .= "Дедушку по папиной линии зовут ".$this->father->getFather()->getName()."<br>";
        }
        /**/
      }
      echo $info;
    }
  }
  
  $nina = new Person("Нина",70);
  /*
   дедушка по маминой линии
   бабушка по папиной линии
   дедушка по папиной линии
  */
  $kirill = new Person("Кирилл",71);
  $lena = new Person("Лена",73);
  $petr = new Person("Пётр",75);
  
  /**/
  $oleg = new Person("Олег",34, $lena, $petr);/**/
  $olga = new Person("Ольга",34, $nina, $kirill);/**/
  $igor = new Person("Игорь",10,$olga,$oleg);
  echo $olga->getInfo();
  /**/
  echo "<hr>";
  echo $igor->getInfo();
  
  /*echo "<hr>";
  var_dump($igor);*/
?>
