<?php
$db = new Database();
$heading = "Notes";

$notes = $db->query("SELECT * FROM notes where user_id=1")->fetchAll();

require "views/notes.view.php";

