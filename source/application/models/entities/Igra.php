<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Igra
 *
 * @author Dragana Milovancevic 2013/0048
 *
 * @ORM\Table(name="igra")
 * @ORM\Entity
 */
class Igra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDIgr", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idigr;

    /**
     * @var integer
     *
     * @ORM\Column(name="Poeni", type="integer", nullable=false)
     */
    private $poeni;

    /**
     * @var integer
     *
     * @ORM\Column(name="Putnici", type="integer", nullable=false)
     */
    private $putnici;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=1, nullable=false)
     */
    private $status;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Osvajanje", mappedBy="idigr")
     */
    private $idosv;

    /**
     * @var \NivoTezine
     *
     * @ORM\ManyToOne(targetEntity="NivoTezine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDNiv", referencedColumnName="IDNiv")
     * })
     */
    private $idniv;

    /**
     * @var \Takmicar
     *
     * @ORM\ManyToOne(targetEntity="Takmicar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDKor", referencedColumnName="IDKor")
     * })
     */
    private $idkor;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idosv = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idigr
     *
     * @return integer 
     */
    public function getIdigr()
    {
        return $this->idigr;
    }

    /**
     * Set poeni
     *
     * @param integer $poeni
     * @return Igra
     */
    public function setPoeni($poeni)
    {
        $this->poeni = $poeni;
    
        return $this;
    }

    /**
     * Get poeni
     *
     * @return integer 
     */
    public function getPoeni()
    {
        return $this->poeni;
    }

    /**
     * Set putnici
     *
     * @param integer $putnici
     * @return Igra
     */
    public function setPutnici($putnici)
    {
        $this->putnici = $putnici;
    
        return $this;
    }

    /**
     * Get putnici
     *
     * @return integer 
     */
    public function getPutnici()
    {
        return $this->putnici;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Igra
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add idosv
     *
     * @param \Osvajanje $idosv
     * @return Igra
     */
    public function addIdosv(\Osvajanje $idosv)
    {
        $this->idosv[] = $idosv;
    
        return $this;
    }

    /**
     * Remove idosv
     *
     * @param \Osvajanje $idosv
     */
    public function removeIdosv(\Osvajanje $idosv)
    {
        $this->idosv->removeElement($idosv);
    }

    /**
     * Get idosv
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdosv()
    {
        return $this->idosv;
    }

    /**
     * Set idniv
     *
     * @param \NivoTezine $idniv
     * @return Igra
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
     * Set idkor
     *
     * @param \Takmicar $idkor
     * @return Igra
     */
    public function setIdkor(\Takmicar $idkor = null)
    {
        $this->idkor = $idkor;
    
        return $this;
    }

    /**
     * Get idkor
     *
     * @return \Takmicar 
     */
    public function getIdkor()
    {
        return $this->idkor;
    }
}