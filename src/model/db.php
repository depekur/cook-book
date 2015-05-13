<?php
error_reporting(E_ERROR | E_PARSE);
// открываем базу данных 
// создаем если базы нет 
$db = sqlite_open("k"); 
  
// Создадим таблицу в базе 
$query=("SELECT id FROM chat LIMIT 1");
if (!sqlite_query($db, $query)){
  $query = ("CREATE TABLE chat 
            (id       INTEGER   PRIMARY KEY, 
             name     TEXT, 
             massage  TEXT,
             time     TEXT);
            ");
  sqlite_query($db, $query, $query_error); 
}
//вычисляем по айпи
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
//принимаем переменные из формы
if (isset($_POST['massage'])){
  $massage = strip_tags($_POST['massage']);
  if ($name = $_POST['name']) 
    $name = strip_tags($_POST['name']);
  else
    $name = $ip; 
  $time = date('D m-Y G:i:s'); 
  // пишем сообщение в бд 
  $query = ("INSERT INTO chat(name, massage, time) 
            VALUES ('$name', '$massage', '$time');
          ");
  sqlite_exec($db, $query); 
}
//удаляем пост по запросу
if (isset($_POST['delete'])) {
    $delete = $_POST['delete'];
    $query = ("DELETE FROM chat WHERE id='$delete'");
    sqlite_exec($db, $query); 
}
// делаем выборку  
$res = sqlite_query($db, "SELECT * FROM chat", $query_error); 
?>