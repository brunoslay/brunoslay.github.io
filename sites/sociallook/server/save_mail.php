<?php

// echo "<pre>" , var_dump( $_POST ) , "</pre>";

require_once "db/conect.php";
require_once "mod/State.php";

$email = $_POST['email'];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo "ok mail, ";
} else {

	echo "fail mail";
	exit;

}


$state = new State();

$hasMail = $state->getLeads($email);

if ($hasMail) {
	echo "but Email already exist";
	exit;
}

$state->saveLeads($email);

echo "Saved";


