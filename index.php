<?php
require('controller/frontend.php');


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'home') {
        home();
    } elseif ($_GET['action'] == 'renters') {
       renters();
    } elseif ($_GET['action'] == 'models') {
        models();
    } 
}else {
    home();
}
