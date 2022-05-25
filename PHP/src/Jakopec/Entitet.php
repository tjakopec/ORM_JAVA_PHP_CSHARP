<?php


namespace Jakopec;

use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;

/** @MappedSuperclass */
abstract class Entitet
{
    /** @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * Entitet constructor.
     * @param int $id
     */
    public function __construct(int $id = 0)
    {
        $this->id = $id;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }


}