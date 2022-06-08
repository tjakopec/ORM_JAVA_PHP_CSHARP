<?php

// Prvo je potrebno provesti kreiranje baze:
// php doctrine orm:schema-tool:update --force

// Provjeriti da li je shema baze kreirana

require 'vendor/autoload.php';
require_once 'Start.php';
new Start();