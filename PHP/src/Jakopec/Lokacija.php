<?php


namespace Jakopec;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;


/**
 * @Entity
 * @Table(name="lokacija")
 */
class Lokacija extends Entitet
{

    /** @Column(type="float") */
    private $longitude;
    /** @Column(type="float") */
    private $latitude;
    /** @Column(type="string") */
    private $naziv;

    /**
     * Igrac constructor.
     * @param int $id
     * @param float $longitude
     * @param float $latitude
     * @param string $naziv
     */
    public function __construct(int $id = 0, float $longitude = 0, float $latitude = 0, string $naziv = '')
    {
        parent::__construct($id);
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->naziv = $naziv;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getNaziv(): string
    {
        return $this->naziv;
    }

    /**
     * @param string $naziv
     */
    public function setNaziv(string $naziv)
    {
        $this->naziv = $naziv;
    }


}