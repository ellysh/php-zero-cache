#!/usr/bin/env php

<?php
include("zero_cache.php");

function print_index($client)
{
    for ($i = 0; $i < 10; $i++)
    {
        print("$i = {$client->ReadLong($i)}\n");
    }
}

$client = new Client();

print_index($client);
