#!/usr/bin/env php

<?
include("registrar_client.php");

$client = new RegistrarClient("tcp_test.log", "tcp://localhost:5570", 0);

$key = "key1";
$data = "test data 1\0";

$client->WriteData($key, $data, strlen($data));
$result = $client->ReadData($key)."\0";

assert($data === $result);
?>
