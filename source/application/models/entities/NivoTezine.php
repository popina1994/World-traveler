<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * NivoTezine
 *
 * @ORM\Table(name="nivo_tezine")
 * @ORM\Entity
 */
class NivoTezine
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDNiv", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idniv;

    /**
     * @var string
     *
     * @ORM\Column(name="Naziv", type="string", length=20, nullable=false)
     */
    private $naziv;


    /**
     * Constructor
     */
    public function __construct()
    {
    }
    
    /**
     * Get idniv
     *
     * @return integer 
     */
    public function getIdniv()
    {
        return $this->idniv;
    }

    /**
     * Set naziv
     *
     * @param string $naziv
     * @return NivoTezine
     */
    public function setNaziv($naziv)
    {
        $this->naziv = $naziv;
    
        return $this;
    }

    /**
     * Get naziv
     *
     * @return string 
     */
    public function getNaziv()
    {
        return $this->naziv;
    }


}