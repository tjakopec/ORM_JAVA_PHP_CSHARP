<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Jakopec\Igrac;
use Jakopec\Lokacija;
use Jakopec\MjesanjeDvaUnosa;
use Jakopec\MjesanjeTriUnosa;
use Jakopec\PartijaDvaIgraca;
use Jakopec\PartijaDvaPara;
use Jakopec\PartijaTriIgraca;

class Start
{
    private $entityManager;
    private $lokacija;
    private $igrac1;
    private $igrac2;
    private $igrac3;
    private $igrac4;
    private $partije;

    /**
     * Start constructor.
     */
    public function __construct()
    {

        $this->defineDoctrine();

        $this->partije = [];
        $this->ucitajPartije();
        $this->insert();

        $this->select();


    }

    private function select()
    {
        $dql = $this->entityManager->createQuery('SELECT p FROM Jakopec\Partija p');
        $partije = $dql->getResult();
        foreach ($partije as $partija) {
            echo $partija . PHP_EOL;
        }
    }

    private function insert()
    {
        foreach ($this->partije as $partija) {
            $this->entityManager->persist($partija);
        }
        $this->entityManager->flush();
    }

    private function ucitajPartije()
    {
        $this->lokacija = new Lokacija();
        $this->lokacija->setNaziv('Caffe Bar Peppermint');
        $this->lokacija->setLongitude(18.6098766);
        $this->lokacija->setLatitude(45.5605825);
        $this->entityManager->persist($this->lokacija);

        $this->igrac1 = new Igrac();
        $this->igrac1->setIme('Tomislav');
        $this->igrac1->setPrezime('Jakopec');
        $this->entityManager->persist($this->igrac1);

        $this->igrac2 = new Igrac();
        $this->igrac2->setIme('Marijan');
        $this->igrac2->setPrezime('Zidar');
        $this->entityManager->persist($this->igrac2);

        $this->igrac3 = new Igrac();
        $this->igrac3->setIme('Marija');
        $this->igrac3->setPrezime('Zimska');
        $this->entityManager->persist($this->igrac3);

        $this->igrac4 = new Igrac();
        $this->igrac4->setIme('Anita');
        $this->igrac4->setPrezime('Račman');
        $this->entityManager->persist($this->igrac4);

        $this->kreirajPartijuDvaIgraca();

        $this->kreirajPartijuTriIgraca();

        $this->kreirajPartijuDvaPara();

    }

    private function kreirajPartijuDvaIgraca()
    {
        $p = new PartijaDvaIgraca();
        $p->setDoKolikoSeIgra(501);
        $p->setLokacija($this->lokacija);
        $p->setUnosi($this->igrac1);
        $igraci = [];
        $igraci[] = $this->igrac1;
        $igraci[] = $this->igrac2;
        $p->setIgraci($igraci);
        $mjesanja = [];

        $m = new MjesanjeDvaUnosa();
        $m->setPartija($p);
        $m->setBodovaPrviUnos(10);
        $m->setBodovaDrugiUnos(152);
        $m->setZvanjePrviUnos(0);
        $m->setZvanjeDrugiUnos(20);
        $mjesanja[] = $m;

        $m = new MjesanjeDvaUnosa();
        $m->setPartija($p);
        $m->setBodovaPrviUnos(152);
        $m->setBodovaDrugiUnos(10);
        $m->setZvanjePrviUnos(0);
        $m->setZvanjeDrugiUnos(20);
        $mjesanja[] = $m;


        $p->setMjesanja($mjesanja);
        $this->entityManager->persist($p);
        $this->partije[] = $p;
    }

    private function kreirajPartijuTriIgraca()
    {
        $p = new PartijaTriIgraca();
        $p->setDoKolikoSeIgra(501);
        $p->setLokacija($this->lokacija);
        $p->setUnosi($this->igrac1);
        $igraci = [];
        $igraci[] = $this->igrac1;
        $igraci[] = $this->igrac2;
        $igraci[] = $this->igrac3;
        $p->setIgraci($igraci);
        $mjesanja = [];

        $m = new MjesanjeTriUnosa();
        $m->setPartija($p);
        $m->setBodovaPrviUnos(10);
        $m->setBodovaDrugiUnos(76);
        $m->setBodovaTreciUnos(76);
        $m->setZvanjePrviUnos(0);
        $m->setZvanjeDrugiUnos(20);
        $m->setZvanjeTreciUnos(0);

        $mjesanja[] = $m;

        for ($i = 0; $i < 5; $i++) {
            $m = new MjesanjeTriUnosa();
            $m->setPartija($p);
            $m->setBodovaPrviUnos(10);
            $m->setBodovaDrugiUnos(76);
            $m->setBodovaTreciUnos(76);
            $m->setZvanjePrviUnos(0);
            $m->setZvanjeDrugiUnos(20);
            $m->setZvanjeTreciUnos(0);
            $mjesanja[] = $m;
        }

        $p->setMjesanja($mjesanja);
        $this->entityManager->persist($p);
        $this->partije[] = $p;
    }

    private function kreirajPartijuDvaPara()
    {
        $p = new PartijaDvaPara();
        $p->setDoKolikoSeIgra(501);
        $p->setLokacija($this->lokacija);
        $p->setUnosi($this->igrac1);
        $igraci = [];
        $igraci[] = $this->igrac1;
        $igraci[] = $this->igrac2;
        $igraci[] = $this->igrac3;
        $igraci[] = $this->igrac4;
        $p->setIgraci($igraci);
        $mjesanja = [];

        $m = new MjesanjeDvaUnosa();
        $m->setPartija($p);
        $m->setBodovaPrviUnos(10);
        $m->setBodovaDrugiUnos(152);
        $m->setZvanjePrviUnos(0);
        $m->setZvanjeDrugiUnos(20);
        $mjesanja[] = $m;

        $m = new MjesanjeDvaUnosa();
        $m->setPartija($p);
        $m->setBodovaPrviUnos(152);
        $m->setBodovaDrugiUnos(10);
        $m->setZvanjePrviUnos(0);
        $m->setZvanjeDrugiUnos(20);
        $mjesanja[] = $m;


        $p->setMjesanja($mjesanja);
        $this->entityManager->persist($p);
        $this->partije[] = $p;
    }

    // ovo je inače u bootstrap.php
    private function defineDoctrine()
    {

        $config = ORMSetup::createAnnotationMetadataConfiguration(array(__DIR__ . "/src"), true, null, null);

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
        try {
            $this->entityManager = EntityManager::create($conn, $config);
        } catch (\Doctrine\ORM\Exception\ORMException $e) {
            print_r($e);
        }
    }

}

