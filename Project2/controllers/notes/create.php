<?php
use Core\Database;

require base_path('Core/Validator.php');

$userID = 2;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    

    $body_min_ln = 3;
    $body_max_ln = 5;

    if (! Validator::string($_POST['body'], $body_min_ln, $body_max_ln)) {
        $errors['body'] = "Jābūt starp {$body_min_ln} un {$body_max_ln} simboli";
    }
    
    
    // if (strlen($_POST['body']) > $body_max_ln) {
    //     $errors['body'] = "Jābūt starp {$body_min_ln} un {$body_max_ln} simboli";
    // }

    if (empty($errors)) {
    $sql = "INSERT INTO notes (body, user_id) VALUE (:body, :user_id)";
    $db->query($sql, ['body' => $_POST['body'], 'user_id' => $userID]);

    $_POST['body'] = '';
    }
}

view("notes/create.view.php", [
    'page' => 'Create',
    'errors' => $errors
]);