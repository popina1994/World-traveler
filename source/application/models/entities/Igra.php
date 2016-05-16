<?php

include_once 'takmicar.php';


use Doctrine\ORM\Mapping as ORM;

/**
 * Igra
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
     * @ORM\ManyToMany(targetEntity="Oblast", inversedBy="idigr")
     * @ORM\JoinTable(name="osvajanje",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDIgr", referencedColumnName="IDIgr")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDObl", referencedColumnName="IDObl")
     *   }
     * )
     */
    private $idobl;

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
        $this->idobl = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add idobl
     *
     * @param \Oblast $idobl
     * @return Igra
     */
    public function addIdobl(\Oblast $idobl)
    {
        $this->idobl[] = $idobl;
    
        return $this;
    }

    /**
     * Remove idobl
     *
     * @param \Oblast $idobl
     */
    public function removeIdobl(\Oblast $idobl)
    {
        $this->idobl->removeElement($idobl);
    }

    /**
     * Get idobl
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdobl()
    {
        return $this->idobl;
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