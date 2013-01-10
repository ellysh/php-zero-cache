#!/usr/bin/env php

<?php
dl('registrar_client.so');

#print PHP_SHLIB_SUFFIX;

#include("registrar_client.php");

echo 'Hello, world!'; 
?>
