<?php

$link = mysqli_connect("localhost", "root", "", "gb");
if(! $link){
    die('<b>Error</b> connection to the database');
}