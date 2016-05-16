<?php

include_once 'igra.php';


use Doctrine\ORM\Mapping as ORM;

/**
 * Oblast
 *
 * @ORM\Table(name="oblast")
 * @ORM\Entity
 */
class Oblast
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDObl", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idobl;

    /**
     * @var string
     *
     * @ORM\Column(name="Naziv", type="string", length=50, nullable=false)
     */
    private $naziv;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Oblast", inversedBy="idobl1")
     * @ORM\JoinTable(name="se_granici_sa",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDObl1", referencedColumnName="IDObl")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDObl2", referencedColumnName="IDObl")
     *   }
     * )
     */
    private $idobl2;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="VrediPutnika", mappedBy="idobl")
     */
    private $idvp;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idobl2 = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idobl
     *
     * @return integer 
     */
    public function getIdobl()
    {
        return $this->idobl;
    }

    /**
     * Set naziv
     *
     * @param string $naziv
     * @return Oblast
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

    /**
     * Add idobl2
     *
     * @param \Oblast $idobl2
     * @return Oblast
     */
    public function addIdobl2(\Oblast $idobl2)
    {
        $this->idobl2[] = $idobl2;
    
        return $this;
    }

    /**
     * Remove idobl2
     *
     * @param \Oblast $idobl2
     */
    public function removeIdobl2(\Oblast $idobl2)
    {
        $this->idobl2->removeElement($idobl2);
    }

    /**
     * Get idobl2
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdobl2()
    {
        return $this->idobl2;
    }

}