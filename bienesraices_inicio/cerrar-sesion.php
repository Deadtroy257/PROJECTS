<?php

session_start();
//can use the following functions to close the session
#session_unset();
#session_destroy();

//but it´s better to change the session content to an empty array
$_SESSION = [];

header('location: /');