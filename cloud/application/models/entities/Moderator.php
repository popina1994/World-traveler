<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Moderator
 *
 * @author Dragana Milovancevic 2013/0048
 *
 * @ORM\Table(name="moderator")
 * @ORM\Entity
 */
class Moderator
{
    /**
     * @var \RegKorisnik
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="RegKorisnik")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDKor", referencedColumnName="IDKor")
     * })
     */
    private $idkor;


    /**
     * Set idkor
     *
     * @param \RegKorisnik $idkor
     * @return Moderator
     */
    public function setIdkor(\RegKorisnik $idkor)
    {
        $this->idkor = $idkor;
    
        return $this;
    }

    /**
     * Get idkor
     *
     * @return \RegKorisnik 
     */
    public function getIdkor()
    {
        return $this->idkor;
    }
}