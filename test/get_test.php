#!/usr/bin/env php

<?php
include("zero_cache.php");

define('INDEX_LONG', 0);
define('DATA_LONG', 1024);

define('INDEX_DOUBLE', 1);
define('DATA_DOUBLE', 100.53);

function init_data($client)
{
    $client->WriteLong(INDEX_LONG, DATA_LONG);
    $client->WriteDouble(INDEX_DOUBLE, DATA_DOUBLE);
}

function check_data($client)
{
    assert(DATA_LONG == $client->ReadLong(INDEX_LONG));
    assert(DATA_DOUBLE == $client->ReadDouble(INDEX_DOUBLE));
}

$client = new Client();

init_data($client);

check_data($client);
