<?php

require 'User.php';
require 'UserBacket.php';

$ivanov = new User('Иван', 'ivan@mail.ru');
$ivanov->info();

$petrov = new User('Пётр', 'petay@mail.ru');
$petrov->info();


$pupkin = new UserBacket('вася', 'vasy@mail.ru','Aplle', 'Samsung');
$pupkin->infoGoods();

$serg = new UserBacket('серёга', 'serg@mail.ru', 'Lenovo', 'Lenovo Pover3');
$serg->infoGoods();



/*
class A {

    public function foo() {
    	static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();  //Вывод:1 $x-это статическая переменная хранящая значение  
$a2->foo();  //Вывод:2 внутри метода foo и значение ей задано начальное
$a1->foo();  //Вывод:3
$a2->foo();  //Вывод:4


class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); // Вывод:1 Получается что B наследует тот же метод что в А но уже как бы у него он свой 
$b1->foo(); // Вывод:1 т.е. для B метод свой, для А метод свой и поэтому получается каждый объект 
$a1->foo(); // Вывод:2  обращается к методу 2 раза отсюда 1,1 и 2,2
$b1->foo(); // Вывод:2 
*/

?>