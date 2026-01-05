<?php
use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database']);

$sql = "SELECT * FROM notes";
$notes = $db->query($sql)->get();


view("notes/index.view.php", [
    'page' => 'Notes',
    'notes' => $notes
]);
