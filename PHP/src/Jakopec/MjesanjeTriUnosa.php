<?php


namespace Jakopec;


use Exception;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;

/**
 * @Entity
 */
class MjesanjeTriUnosa extends MjesanjeDvaUnosa
{

    /** @Column(type="integer", name="bodovatreciunos") */
    private $bodovaTreciUnos;
    /** @Column(type="integer", name="zvanjetreciunos") */
    private $zvanjeTreciUnos;

    /**
     * MjesanjeDvaUnosa constructor.
     * @param int $id
     * @param bool $stiglja
     * @param bool $belot
     * @param DateTime|null $datumUnosa
     * @param int $bodovaPrviUnos
     * @param int $bodovaDrugiUnos
     * @param int $zvanjePrviUnos
     * @param int $zvanjeDrugiUnos
     * @param int $bodovaTreciUnos
     * @param int $zvanjeTreciUnos
     * @throws Exception
     */
    public function __construct(int $id=0, bool $stiglja = false, bool $belot = false, DateTime $datumUnosa = null, int $bodovaPrviUnos = 0, int $bodovaDrugiUnos = 0, int $zvanjePrviUnos = 0, int $zvanjeDrugiUnos = 0, int $bodovaTreciUnos = 0, $zvanjeTreciUnos = 0)
    {
        parent::__construct($id, $stiglja, $belot, $datumUnosa, $bodovaPrviUnos, $bodovaDrugiUnos, $zvanjePrviUnos, $zvanjeDrugiUnos);
        $this->bodovaTreciUnos = $bodovaTreciUnos;
        $this->zvanjeTreciUnos = $zvanjeTreciUnos;
    }

    /**
     * @inheritDoc
     */
    public function getRezultat(): Rezultat
    {
        $rezultat = parent::getRezultat();
        $rezultat->setTreci($this->getBodovaTreciUnos() + $this->getZvanjeTreciUnos());
        return $rezultat;
    }

    /**
     * @return int
     */
    public function getBodovaTreciUnos(): int
    {
        return $this->bodovaTreciUnos;
    }

    /**
     * @param int $bodovaTreciUnos
     */
    public function setBodovaTreciUnos(int $bodovaTreciUnos)
    {
        $this->bodovaTreciUnos = $bodovaTreciUnos;
    }

    /**
     * @return int
     */
    public function getZvanjeTreciUnos(): int
    {
        return $this->zvanjeTreciUnos;
    }

    /**
     * @param int $zvanjeTreciUnos
     */
    public function setZvanjeTreciUnos(int $zvanjeTreciUnos)
    {
        $this->zvanjeTreciUnos = $zvanjeTreciUnos;
    }
}