<?php
// bootstrap.php
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = ORMSetup::createAnnotationMetadataConfiguration(array(__DIR__ . "/src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
// or if you prefer XML
// $config = ORMSetup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);

// database configuration parameters
// grant all privileges on orm_php.* to 'orm'@'localhost' identified by 'orm';
// create database orm_php character set utf8mb4 collate utf8mb4_general_ci;
$conn = array(
    'dbname' => 'orm_php',
    'user' => 'orm',
    'password' => 'orm',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);

// obtaining the entity manager
$entityManager = null;
try {
    $entityManager = EntityManager::create($conn, $config);
} catch (\Doctrine\ORM\Exception\ORMException $e) {
    print_r($e);
}