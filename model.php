<?php

function get_messages() {
  $sql = "SELECT * FROM messages ORDER BY dt DESC"; //сортировка по убыванию
  $result = mysql_query($sql);

  if (!$result) //если накасячили - бд скрипт убиваем
  die(mysql_error());

  $n = mysql_num_rows($result); //из служебной инфы - перегнать в массив
  $arr = array(); //в массиве храним сообщения

  for ($i = 0; $i < $n; $i++) {
    $row = mysql_fetch_assoc($result);
    $arr[] = $row; // добавл. в конец массива в arr доб. пересенную row
  }

  return $arr;
}

function send_message($name, $text) {
  // обрезает имя и текст, чтобы вып. проверку
  $name = trim($name); // трим - убирает пробелы
  $text = trim($text);

  if ($name == "" || $text == "") // если че та не ввел, то делаем ретон
  return;

  $dt = date('Y-m-d H:i:s'); // вычисляем дату
  $sql = "INSERT INTO messages (dt, name, text) VALUE ('$dt', '$name', '$text')";
  $result = mysql_query($sql);

  if (!$result)
  die(mysql_error());
}
 ?>
