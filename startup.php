<?php

function startup()
{
  //connect bd
  $hostname = 'localhost';
  $username = 'root';
  $password = '';
  $dbName = 'test';

  //language setting
  setlocale(LC_ALL, 'ru_RU.CP1251');

  //connect bd
  mysql_connect($hostname, $username, $password) or die ('no connect bd');
  mysql_query('SET NAME cp1251');
  mysql_select_db($dbName) or die ('no data base'); //выбери базу или умри

  //open session
  session_start();
}
?>
