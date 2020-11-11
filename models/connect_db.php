<?php 
try {
  $pdo = new PDO('mysql:host=localhost;dbname=task1_users', 
                 'test', 
                 'test',
                 [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
}
catch (PDOException $e) {
  echo "Неудалось устновить соединение с базой данных $e";
}
 

