<?php


namespace Jakopec;

use Jakopec\PartijaTriIgraca;
use DateTime as DateTime;
use Exception;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @Entity
 * @InheritanceType( "SINGLE_TABLE" )
 * @DiscriminatorColumn( name = "vrsta", type = "string" )
 * @DiscriminatorMap({"dvaUnosa" = "MjesanjeDvaUnosa", "triUnosa" = "MjesanjeTriUnosa"})
 * @Table(name="mjesanje")
 */
abstract class Mjesanje extends Entitet
{

    /** @Column(type="boolean") */
    private $stiglja;
    /** @Column(type="boolean") */
    private $belot;
    /** @Column(type="datetime", name="datumunosa") */
    private $datumUnosa;

    /**
     * @ManyToOne(targetEntity="PartijaTriIgraca")
     * @JoinColumn(name="partija", referencedColumnName="id")
     */
    private $partija;

    /**
     * Mjesanje constructor.
     * @param int $id
     * @param bool $stiglja
     * @param bool $belot
     * @param DateTime $datumUnosa
     * @throws Exception
     */
    public function __construct(int $id, bool $stiglja = false, bool $belot = false, DateTime $datumUnosa = null)
    {
        parent::__construct($id);
        $this->stiglja = $stiglja;
        $this->belot = $belot;
        $this->datumUnosa = $datumUnosa == null ? new DateTime() : $datumUnosa;
    }

    /**
     * @return Rezultat
     */
    public abstract function getRezultat(): Rezultat;

    /**
     * @return bool
     */
    public function isStiglja(): bool
    {
        return $this->stiglja;
    }

    /**
     * @param bool $stiglja
     */
    public function setStiglja(bool $stiglja)
    {
        $this->stiglja = $stiglja;
    }

    /**
     * @return bool
     */
    public function isBelot(): bool
    {
        return $this->belot;
    }

    /**
     * @param bool $belot
     */
    public function setBelot(bool $belot)
    {
        $this->belot = $belot;
    }

    /**
     * @return DateTime
     */
    public function getDatumUnosa(): DateTime
    {
        return $this->datumUnosa;
    }

    /**
     * @param DateTime $datumUnosa
     */
    public function setDatumUnosa(DateTime $datumUnosa)
    {
        $this->datumUnosa = $datumUnosa;
    }

    /**
     * @return mixed
     */
    public function getPartija()
    {
        return $this->partija;
    }

    /**
     * @param mixed $partija
     */
    public function setPartija($partija): void
    {
        $this->partija = $partija;
    }


}