<?php
use Core\Database;

require base_path('Core\Validator.php');

$userID = 2;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    

    $body_min_ln = 3;
    $body_max_ln = 255;

    if (! Validator::string($_POST['message'], $body_min_ln, $body_max_ln)) {
        $errors['message'] = "Jābūt starp {$body_min_ln} un {$body_max_ln} simboli";
    }
    
    
    // if (strlen($_POST['body']) > $body_max_ln) {
    //     $errors['body'] = "Jābūt starp {$body_min_ln} un {$body_max_ln} simboli";
    // }

    if (empty($errors)) {
    $sql = "INSERT INTO contacts (message, user_id) VALUE (:message, :user_id)";
    $db->query($sql, ['message' => $_POST['message'], 'user_id' => $userID]);

    $_POST['message'] = '';
    }
}

view("contacts.view.php", [
    'page' => 'Contacts',
    'errors' => $errors
]);