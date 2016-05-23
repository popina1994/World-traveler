<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Pitanje
 *
 * @ORM\Table(name="pitanje")
 * @ORM\Entity
 */
class Pitanje
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IdPit", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpit;

    /**
     * @var integer
     *
     * @ORM\Column(name="BrTacno", type="integer", nullable=true)
     */
    private $brtacno;

    /**
     * @var integer
     *
     * @ORM\Column(name="BrNetacno", type="integer", nullable=true)
     */
    private $brnetacno;

    /**
     * @var \NivoTezine
     *
     * @ORM\ManyToOne(targetEntity="NivoTezine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdNiv", referencedColumnName="IDNiv")
     * })
     */
    private $idniv;

    /**
     * @var \Oblast
     *
     * @ORM\ManyToOne(targetEntity="Oblast")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDObl", referencedColumnName="IDObl")
     * })
     */
    private $idobl;

    /**
     * @var \Moderator
     *
     * @ORM\ManyToOne(targetEntity="Moderator")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDKor", referencedColumnName="IDKor")
     * })
     */
    private $idkor;


    /**
     * Get idpit
     *
     * @return integer 
     */
    public function getIdpit()
    {
        return $this->idpit;
    }

    /**
     * Set brtacno
     *
     * @param integer $brtacno
     * @return Pitanje
     */
    public function setBrtacno($brtacno)
    {
        $this->brtacno = $brtacno;
    
        return $this;
    }

    /**
     * Get brtacno
     *
     * @return integer 
     */
    public function getBrtacno()
    {
        return $this->brtacno;
    }

    /**
     * Set brnetacno
     *
     * @param integer $brnetacno
     * @return Pitanje
     */
    public function setBrnetacno($brnetacno)
    {
        $this->brnetacno = $brnetacno;
    
        return $this;
    }

    /**
     * Get brnetacno
     *
     * @return integer 
     */
    public function getBrnetacno()
    {
        return $this->brnetacno;
    }

    /**
     * Set idniv
     *
     * @param \NivoTezine $idniv
     * @return Pitanje
     */
    public function setIdniv(\NivoTezine $idniv = null)
    {
        $this->idniv = $idniv;
    
        return $this;
    }

    /**
     * Get idniv
     *
     * @return \NivoTezine 
     */
    public function getIdniv()
    {
        return $this->idniv;
    }

    /**
     * Set idobl
     *
     * @param \Oblast $idobl
     * @return Pitanje
     */
    public function setIdobl(\Oblast $idobl = null)
    {
        $this->idobl = $idobl;
    
        return $this;
    }

    /**
     * Get idobl
     *
     * @return \Oblast 
     */
    public function getIdobl()
    {
        return $this->idobl;
    }

    /**
     * Set idkor
     *
     * @param \Moderator $idkor
     * @return Pitanje
     */
    public function setIdkor(\Moderator $idkor = null)
    {
        $this->idkor = $idkor;
    
        return $this;
    }

    /**
     * Get idkor
     *
     * @return \Moderator 
     */
    public function getIdkor()
    {
        return $this->idkor;
    }
}