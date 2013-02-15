#!/usr/bin/env php

<?php
include("client_wrap.php");

define('KEY_LONG', 'key1');
define('DATA_LONG', 1024);

define('KEY_DOUBLE', 'key2');
define('DATA_DOUBLE', 100.53);

define('KEY_STRING', 'key3');
define('DATA_STRING', 'test data');

function init_data($client)
{
    $client->WriteLong(KEY_LONG, DATA_LONG);
    $client->WriteDouble(KEY_DOUBLE, DATA_DOUBLE);
    $client->WriteString(KEY_STRING, DATA_STRING);
}

function check_data($client)
{
    assert(DATA_LONG == $client->ReadLong(KEY_LONG));
    assert(DATA_DOUBLE == $client->ReadDouble(KEY_DOUBLE));
    assert(DATA_STRING == $client->ReadString(KEY_STRING));
}

$client = new ClientWrap("get_test.log", "ipc:///var/run/zero-cache/0", 0);

init_data($client);

check_data($client);
