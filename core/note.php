<?php
include_once 'db.php';

class Note
{
    public $id = null;
    public $name = null;
    public $title = null;
    public $content = null;
    public $created_at = null;

    public function __construct()
    {
        $db = new DB;
        $db->getDB();
    }

    public function setVars($id, $name, $title, $content, $created_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->content = $content;
        $this->created_at = $created_at;
    }

    public function addNote($name, $title, $content)
    {
        $this->name = $name;
        $this->title = $title;
        $this->content = $content;
        $sql = "INSERT INTO notes VALUES (NULL, '$title', '$name', '$content', CURRENT_TIMESTAMP)";
        mysql_query($sql);
    }

    public function getNotes()
    {
        $arr = array();
        if (empty($_SESSION['name'])) {
            return $arr;
        }
        $name = $_SESSION['name'];
        $sql = "SELECT * FROM notes WHERE name='$name' ORDER BY 'created_at'  DESC LIMIT 0,30; ";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        while (!empty($row)) {
            $tmp = new Note;
            $tmp->setVars($row['id'], $row['name'], $row['title'], $row['content'], $row['created_at']);
            array_push($arr, $tmp);
            $row = mysql_fetch_array($result);
        }
        return $arr;
    }
}