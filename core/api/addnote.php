<?php
include_once '../note.php';
session_start();
$note=new Note;
$title=$_POST['title'];
$content=$_POST['content'];
$name=$_SESSION['name'];
if(!empty($name) && !empty($title) && !empty($content)){
    $note->addNote($name,$title,$content);
}
?>