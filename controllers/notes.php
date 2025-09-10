<?php
$db = new Database();
$heading = "Notes";

$notes = $db->query("SELECT * FROM notes where user_id=1")->getAll();

require "views/notes.view.php";

