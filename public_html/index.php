<?php

/*
class Cat
{
	private $name;
	private $color;
	private $wight;

	public function __construct(string $name, string $color, int $wight)
	{
		$this->name = $name;
		$this->color = $color;
		$this->wight = $wight;
	}

	public function seyHello()
	{
		echo 'привет меня зовут '.$this->name.' я '.$this->color.' а вешу я '.$this->wight.' кг';
	}

	public function setName(string $name)
	{
		return $this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getColor()
	{
		return $this->color;
	}

	public function setWight(int $wight)
	{
		return $this->wight = $wight;
	}

}

$cat1 = new Cat('пушок', 'рыжий', 12);
$cat1->seyHello();
$cat1->setWight(9);
echo'<br>';
$cat1->seyHello();


echo '<br>';
$cat2 = new Cat('васька', 'чёрный', 8);
$cat2->seyHello();
echo '<br>';

$cat3 = new Cat('Снежок', 'белый', 6);
$cat3->seyHello();


class Post
{
	private $title;
	private $text;

	public function __construct(string $title, string $text)
	{
		$this->title = $title;
		$this->text = $text;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle(string $title): void
	{
		$this->title;
	}

	public function getText()
	{
		return $this->text;
	}

	public function setText(string $text): void
	{
		$this->text;
	}

}

class Lesson extends Post
{
	private $homework;

	public function __construct(string $title, string $text, string $homework)
	{
		parent::__construct($title, $text);
		$this->homework = $homework;
	}

	public function getHomework(): string
	{
		return $this->homework;
	}

	public function setHomework(string $homework): void
	{
		$this->homework;
	}
}

class PaidLesson extends Lesson
{
	private $price;

	public function __construct(string $title, string $text, string $homework, float $price)
	{
		parent::__construct($title, $text, $homework);
		$this->price = $price;
	}

	public function getPrice(): float
	{
		return $this->price;
	}

	public function setPrice(float $price): void
	{
		$this->price;
	}
}

$paidLesson = new PaidLesson('Урок о наследовании в PHP', 'Лол, кек, чебурек', 'Ложитесь спать, утро вечера мудренее', 99.90);
echo '<pre>';
var_dump($paidLesson);
echo '</pre>';
$lesson = new Lesson('Наследование', 'Наследование-это...', 'Разберитесь самостоятельно!');
echo 'Название урока: '.$lesson->getTitle(). '; Содержание: '.$lesson->getText(). ';<br> 
Ваше дз: '.$lesson->getHomework().'<hr>';

echo 'Название урока: '.$paidLesson->getTitle(). '; Содержание: '.$paidLesson->getText(). ';<br> 
Ваше дз: '.$paidLesson->getHomework().' А стоит всё это:'.$paidLesson->getPrice();


interface CalculateArea
{
	public function calculateArea(): float;
}

class Rectangle implements CalculateArea
{
	private $x;
	private $y;

	public function __construct(float $x, float $y)
	{
		$this->x = $x;
		$this->y = $y;
	}

	public function calculateArea(): float
	{
		return $this->x * $this->y;
	}
}

class Square
{
	private $x;

	public function __construct(float $x)
	{
		$this->x = $x;
	}

	public function calculateArea(): float
	{
		return $this->x ** 2;
	}
}

class Circle implements CalculateArea
{
	const PI = 3.14;
	private $r;

	public function __construct(float $r)
	{
		$this->r = $r;
	}

	public function calculateArea(): float
	{
		return self::PI * ($this->r ** 2);
	}
}

$objects = [
	new Circle(6),
	new Square(4),
	new Rectangle(4,5),
];

foreach ($objects as $object) {
	if ($object instanceof CalculateArea) {
		echo 'Объект класса '.get_class($object).' реализует интерфейс CalculateArea. Его площадь: '.$object->calculateArea().'<br>';
	}else{
		echo 'Объект класса '.get_class($object).' не реализует интерфейс CalculateArea.<br>';
	}
}

abstract class NewClass
{
	abstract public function getValue();

	public function printValue()
	{
		echo 'Значение '.$this->getValue();
	}
}

class A extends NewClass
{
	private $value;

	public function __construct(string $value)
	{
		$this->value = $value;
	}

	public function getValue()
	{
		return $this->value;
	}
}

$a = new A('привет');
//$a->printValue();

abstract class HumanAbstract
{
	private $name;

	public function __construct(string $name)
	{
		$this->name = $name;
	}

	public function name(): string
	{
		return $this->name;
	}

	abstract public function getGreetings(): string;
	abstract public function getMyNameIs(): string;

	public function introduceYourself(): string
	{
		return  $this->getGreetings().'! '.$this->getMyNameIs().' '.$this->name.'<br>';
	}
}

class RussianHuman extends HumanAbstract
{
	public function getGreetings(): string
	{
		return 'Привет';
	}

	public function getMyNameIs(): string
	{
		return 'Меня зовут';
	}
}

class EnglishHuman extends HumanAbstract
{
	public function getGreetings(): string
	{
		return 'Hello';
	}

	public function getMyNameIs(): string
	{
		return 'My names is';
	}
}

$russian = new RussianHuman('Сергей');
$english = new EnglishHuman('Bill');

 echo $russian->introduceYourself();
 echo $english->introduceYourself();
*/?>
 <?php
require 'Picture.php';
?>
	<?php

	if (!isset($_GET['page'])) {
		include 'templates/allPicture.php';
	}elseif ($_GET['page'] == 'onePicture') {
		include 'templates/onePicture.php';
	}

	?>





