<?php
include_once '../note.php';
session_start();
$note=new Note;
$arr=$note->getNotes();
echo json_encode($arr);
?>