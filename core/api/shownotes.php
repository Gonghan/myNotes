<?php
include_once '../note.php';
session_start();
$note = new Note();
$arr = $note->getNotes();
//var_dump($arr);
echo json_encode($arr);
?>