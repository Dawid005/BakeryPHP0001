<?php

require('Website.php');
if(isset($_POST['bread']) && isset( $_POST['cake'])){
    $web = new Website($_POST['bread'], $_POST['cake']);
    $web->Show();
}
else{
    Header('Location: index.php');
}