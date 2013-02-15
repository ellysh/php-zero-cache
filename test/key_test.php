#!/usr/bin/env php

<?php
include("client_wrap.php");

define('KEY_1', 'key1');
define('KEY_2', 'key2');

define('DATA_LONG', 1024);

function init_data($client)
{
    $client->WriteLong(KEY_1, DATA_LONG);
    $client->WriteLong(KEY_2, DATA_LONG);
}

function check_keys($client)
{
    $string = $client->GetKeys();
    $keys = split(';', $string);
    array_pop($keys);

    assert(count($keys) == 2);
    assert($keys[0] == KEY_1);
    assert($keys[1] == KEY_2);
}

$client = new ClientWrap("tcp_test.log", "ipc:///var/run/zero-cache/0", 0);

$client->GetKeys();

init_data($client);

check_keys($client);
