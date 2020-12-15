<?
require(__DIR__ . "/PDO.class.php");

//файлы подключения библиотеки phpmailer 
require(__DIR__ ."/PHPMailer.php");
require(__DIR__ ."/SMTP.php"); 


// Подключение к базе данных
$DB = new DB("localhost", "3306", "newsfeed", "root", "1234");

// Примеры запросов в базу

// Select
// $DB->query("SELECT * FROM fruit WHERE name=? and color=?",array('apple','red'));

// Delete
// $DB->query("DELETE FROM fruit WHERE id = ?", array("1"));

// Update
// $DB->query("UPDATE fruit SET color = ? WHERE name = ?", array("yellow","strawberry"));

// Insert
// $DB->query("INSERT INTO fruit(id,name,color) VALUES(?,?,?)", array(null,"mango","yellow"));//Parameters must be ordered

// Отображение ошибок (используется только на этапе разработки)
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
