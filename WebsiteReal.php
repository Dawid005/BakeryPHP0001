<?php

require('Website.php');

$web = new Website($_POST['bread'], $_POST['cake']);
$web->Show();
