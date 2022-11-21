<?php
require('./include/head.php');


if (isset($_GET['id'])) {
    echo $_GET['id'];
    $service->calendarList->delete('calendarId');
}
