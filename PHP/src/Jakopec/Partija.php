<?php


namespace Jakopec;

use Jakopec\Lokacija;
use Jakopec\Igrac;
use Jakopec\Mjesanje;

use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @Entity
 * @InheritanceType( "SINGLE_TABLE" )
 * @DiscriminatorColumn( name = "vrsta", type = "string" )
 * @DiscriminatorMap({"dvaIgraca" = "PartijaDvaIgraca", "dvaPara" = "PartijaDvaPara", "triIgraca" = "PartijaTriIgraca"})
 * @Table(name="partija")
 */
abstract class Partija extends Entitet
{
    /** @Column(type="integer", name="dokolikoseigra") */
    private $doKolikoSeIgra;
    /**
     * @ManyToOne(targetEntity="Lokacija", fetch="EXTRA_LAZY", cascade={"persist", "remove"})
     * @JoinColumn(name="lokacija", referencedColumnName="id")
     */
    private $lokacija;
    /**
     * @ManyToOne(targetEntity="Igrac", fetch="EAGER", cascade={"persist", "remove"})
     * @JoinColumn(name="unosi", referencedColumnName="id")
     */
    private $unosi;
    /**
     * @OneToMany(targetEntity="Mjesanje", mappedBy="partija", fetch="EXTRA_LAZY", cascade={"persist", "remove"})
     */
    private $mjesanja;
    /**
     * @ManyToMany(targetEntity="Igrac", cascade={"persist", "remove"})
     * @JoinTable(name="partija_igrac", joinColumns={
     *          @JoinColumn(name="partija", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *          @JoinColumn(name="igrac", referencedColumnName="id")
     *     })
     */
    private $igraci;

    /**
     * Partija constructor.
     * @param int $id
     * @param int $doKolikoSeIgra
     * @param Lokacija $lokacija
     * @param Igrac $unosi
     * @param array $mjesanja
     * @param array $igraci
     */
    public function __construct(int $id = 0, int $doKolikoSeIgra = 501, Lokacija $lokacija = null, Igrac $unosi = null, array $mjesanja = [], array $igraci = [])
    {
        $this->doKolikoSeIgra = $doKolikoSeIgra;
        $this->lokacija = $lokacija;
        $this->unosi = $unosi;
        $this->mjesanja = $mjesanja;
        $this->igraci = $igraci;
    }

    /**
     * @return Lokacija
     */
    public function getLokacija(): Lokacija
    {
        return $this->lokacija;
    }

    /**
     * @param Lokacija $lokacija
     */
    public function setLokacija(Lokacija $lokacija)
    {
        $this->lokacija = $lokacija;
    }

    /**
     * @return Igrac
     */
    public function getUnosi(): Igrac
    {
        return $this->unosi;
    }

    /**
     * @param Igrac $unosi
     */
    public function setUnosi(Igrac $unosi)
    {
        $this->unosi = $unosi;
    }

    /**
     * @return array
     */
    public function getIgraci()
    {
        return $this->igraci;
    }

    /**
     * @param array $igraci
     */
    public function setIgraci($igraci)
    {
        $this->igraci = $igraci;
    }

    public function isIgraGotova(): bool
    {

        $rezulat = $this->getRezultat();

        if ($rezulat->isPocetak()) {
            return false;
        }

        if ($rezulat->getTreci() == 0) {
            return $rezulat->getPrvi() == $rezulat->getDrugi() ?
                false : $rezulat->getPrvi() > $this->getDoKolikoSeIgra()
                || $rezulat->getDrugi() > $this->getDoKolikoSeIgra();
        } else {
            if ($rezulat->getPrvi() == $rezulat->getDrugi() ||
                $rezulat->getPrvi() == $rezulat->getTreci() ||
                $rezulat->getDrugi() == $rezulat->getTreci()) {
                return false;
            }

            if ($rezulat->getPrvi() > $this->getDoKolikoSeIgra() ||
                $rezulat->getDrugi() > $this->getDoKolikoSeIgra() ||
                $rezulat->getTreci() > $this->getDoKolikoSeIgra()) {
                return true;
            }

        }

        return false;
    }

    /**
     * @return int
     */
    public function getDoKolikoSeIgra(): int
    {
        return $this->doKolikoSeIgra;
    }

    /**
     * @param int $doKolikoSeIgra
     */
    public function setDoKolikoSeIgra(int $doKolikoSeIgra)
    {
        $this->doKolikoSeIgra = $doKolikoSeIgra;
    }

    public function getRezultat(): Rezultat
    {
        $rezultat = new Rezultat();
        $b = 0;
        foreach ($this->getMjesanja() as $mjesanje) {
            $b += $mjesanje->getRezultat()->getPrvi();
        }
        $rezultat->setPrvi($b);

        $b = 0;
        foreach ($this->getMjesanja() as $mjesanje) {
            $b += $mjesanje->getRezultat()->getDrugi();
        }
        $rezultat->setDrugi($b);

        return $rezultat;
    }

    /**
     * @return array
     */
    public function getMjesanja()
    {
        return $this->mjesanja;
    }

    /**
     * @param array $mjesanja
     */
    public function setMjesanja($mjesanja)
    {
        $this->mjesanja = $mjesanja;
    }

}