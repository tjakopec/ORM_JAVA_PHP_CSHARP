<?php


namespace Jakopec;

use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity
 */
class PartijaDvaPara extends Partija
{
    public function __toString(): string
    {
        $rezultat = $this->getRezultat();
        return 'Partija DVA PARA, igra gotova: ' . ($this->isIgraGotova() ? 'DA': 'NE') . ', ' . $this->getIgraci()[0] . ' i ' .
            $this->getIgraci()[1] . ': ' . $rezultat->getPrvi() .
            ' | ' . $this->getIgraci()[2] . ' i ' . $this->getIgraci()[3] . ': ' . $rezultat->getDrugi();
    }
}