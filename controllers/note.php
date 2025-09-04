<?php
$db = new Database();
$heading = "Note Detail";

$note = $db->query("SELECT * FROM notes where id=:id",['id'=>$_GET['id']])->fetch();

require "views/note.view.php";

