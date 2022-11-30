<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-Requested-With");
$file_url = './data.json';

$file_text = file_get_contents($file_url);
$todo_list = json_decode($file_text);

if(isset($_POST['newTodoText'])){
    // echo "il parametro post è arrivato";
    //prendere il valore inviatoci
    //inserirlo nell'array
    //salvarlo nel file
    //ricaricare i nuovi todo

    // $newTodoText = $_POST['newTotoText'];
    $newTodo = [
        'text' => $_POST['newTodoText'],
        'done' => false
    ];

    array_push($todo_list, $newTodo);
    // print_r($todo_list);

    file_put_contents($file_url, json_encode($todo_list));

    // header('Content-Type: application/json');
    // echo json_encode($todo_list);
} else {
    // echo 'il parametro non è arrivato';
    header('Content-Type: application/json');
    echo json_encode($todo_list);
};

