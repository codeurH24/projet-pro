<?php

function logCreate($idUser, $taskName){

  //$query = "INSERT INTO `log` (`id`, `user_id`, `name_task`, `date`) VALUES (NULL, '14', 'logué sur le site', '2018-12-05 00:00:00');";
  $mysqli = bddConnect();

  bddCreateFlush($mysqli, "log", [
    "user_id" => $idUser,
    "name_task" => $taskName,
    "date" => dbDate()
  ]);

  $mysqli->close();
}

 ?>
