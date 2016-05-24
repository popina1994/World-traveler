<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * VrediPutnika
 *
 * @ORM\Table(name="vredi_putnika")
 * @ORM\Entity
 */
class VrediPutnika
{
	
	/**
	 * @var \NivoTezine
	 *
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 * @ORM\ManyToOne(targetEntity="NivoTezine")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="IDNiv", referencedColumnName="IDNiv")
	 * })
	 */
	private $idniv;
	
	/**
	 * @var \Oblast
	 *
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 * @ORM\ManyToOne(targetEntity="Oblast")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="IDObl", referencedColumnName="IDObl")
	 * })
	 */
	private $idobl;
	
     /**
     * @var integer
     *
     * @ORM\Column(name="BrPlus", type="integer", nullable=false)
     */
    private $brplus;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="BrMinus", type="integer", nullable=false)
     */
    private $brminus;
    

    /**
     * Constructor
     */
    public function __construct()
    {
    }
    
     /**
     * Set idniv
     *
     * @param \NivoTezine $idniv
     * @return VrediPutnika
     */
    public function setIdniv($idniv)
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
     * @return VrediPutnika
     */
    public function setIdobl($idobl)
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
     * Set brplus
     *
     * @param integer $brplus
     * @return VrediPutnika
     */
    public function setBrplus($brplus)
    {
    	$this->brplus = $brplus;
    	return $this;
    }
    
    /**
     * Get brplus
     *
     * @return integer
     */
    public function getBrplus()
    {
    	return $this->brplus;
    }
    
    /**
     * Set brminus
     *
     * @param integer $brminus
     * @return VrediPutnika
     */
    public function setBrminus($brminus)
    {
    	$this->brminus = $brminus;
    	return $this;
    }
    
    /**
     * Get brminus
     *
     * @return integer
     */
    public function getBrminus()
    {
    	return $this->brminus;
    }



}