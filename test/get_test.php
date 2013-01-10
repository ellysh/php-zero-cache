#!/usr/bin/env php

<?php
include("registrar_client.php");

$client = new RegistrarClient("get_test.log", "ipc:///var/run/zero-cache/0", 0);

$key = "key1";
$data = "test data 1\0";

$client->WriteData($key, $data, strlen($data));
$result = $client->ReadData($key)."\0";

assert($data === $result);
?>
