<?php

$toDo = file_get_contents('data.json');

header('Content-Type: application/json');

echo json_encode($toDo);