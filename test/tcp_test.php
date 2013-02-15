#!/usr/bin/env php

<?php
include("client_wrap.php");

define('KEY_LONG', 'key1');
define('DATA_LONG', 1024);

function init_data($client)
{
    $client->WriteLong(KEY_LONG, DATA_LONG);
}

function check_data($client)
{
    assert(DATA_LONG == $client->ReadLong(KEY_LONG));
}

$client = new ClientWrap("tcp_test.log", "tcp://localhost:5570", 0);

init_data($client);

check_data($client);
