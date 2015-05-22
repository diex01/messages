<?php
// connect modules
include_once('startup.php');
include_once('model.php');

// подготовка
startup();

// была отправка формы?
if (!empty($_POST))
{
  send_message($_POST['name'], $_POST['text']);
  header("Location: index.php");
  exit();
}

// получаем список сообщений
$messages = get_messages();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Документ без названия</title>
</head>

<body>
  <form method="post">
    Имя:<br/>
    <input type="text" name="name" /><br/>
    Сообщение:<br/>
    <input type="text" name="text" /><br/>
    <input type="submit" value="Отправить" /><br/>
  </form>

<?php
// в messages лежал  думерный массив, который вернула функция
// мы его пробегаем и в $m будет попадать каждое сообщение
foreach ($messages as $m)
  echo '<p>';
  echo '<i>' . $m['dt'] . ' - ' . $m['name'] . '</i><br/>'; // дата, имя
  echo $m['text']; // сообщение
  echo '</p>'
?>
</body>
</html>
