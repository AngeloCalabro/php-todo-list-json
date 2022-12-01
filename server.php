<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-Requested-With");
$file_url = './data.json';

$file_text = file_get_contents($file_url);
$todo_list = json_decode($file_text);

if(isset($_POST['newTodoText'])){
    // aggiungo un todo

    //prendere il valore inviatoci
    $newTodo = [
        'text' => $_POST['newTodoText'],
        'done' => false
    ];

    //inserirlo nell'array
    array_push($todo_list, $newTodo);
    // print_r($todo_list);

    //ricaricare i nuovi todo
    file_put_contents($file_url, json_encode($todo_list));

} else if(isset($_POST['toggleTodoIndex'])) {
    // togglo un todo
    $todoIndex = $_POST['toggleTodoIndex'];
    echo $todo_list[$todoIndex]->text;
    // echo $todo_list[$todoIndex]->done;
    // if($todo_list[$todoIndex] -> done == 1 ){
    //     // if done
    //     // echo "fatto";
    //     $todo_list[$todoIndex] -> done == false;
    // } else {
    //     // if not done
    //     // echo "da fare";
    //     $todo_list[$todoIndex] -> done == true;
    // }

    // file_put_contents($file_url, json_encode($todo_list));
 
} else if(isset($_POST['deleteTodoIndex'])) {
    $todoIndex = $_POST['deleteTodoIndex']; 
    array_splice($todo_list, $todoIndex, 1);

    file_put_contents($file_url, json_encode($todo_list));

} else {
    // mostro un todo
    // echo 'il parametro non è arrivato';
    header('Content-Type: application/json');
    echo json_encode($todo_list);
};

