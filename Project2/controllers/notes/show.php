<?php
use Core\Database;

$config = require base_path('config.php');


$db = new Database($config['database']);

$userID = 2;

$sql = "SELECT * FROM notes WHERE id = :id"; 
$note = $db->query($sql, ['id' => $_GET['id']])->findOrFail();

// if ($note['user_id'] !== $userID) {
//     abort(Responses::FORBIDDEN);
// }

authorize($note['user_id'] === $userID);

view("notes/show.view.php", [
    'page' => 'Note',
    'note' => $note
]);