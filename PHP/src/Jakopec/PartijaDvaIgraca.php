<?php


namespace Jakopec;

use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity
 */
class PartijaDvaIgraca extends Partija
{
    public function __toString(): string
    {

        $rezultat = $this->getRezultat();
   return 'Partija DVA IGRAČA, igra gotova: ' . ($this->isIgraGotova() ? 'DA': 'NE') . ', ' . $this->getIgraci()[0] . ': ' .
       $rezultat->getPrvi() .
       ' | ' . $this->getIgraci()[1] . ': ' . $rezultat->getDrugi();
    }
}