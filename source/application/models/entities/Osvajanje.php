<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * VrediPutnika
 *
 * @ORM\Table(name="osvajanje")
 * @ORM\Entity
 */
class Osvajanje
{
	
	/**
	 * @var \Igra
	 *
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 * @ORM\ManyToOne(targetEntity="Igra")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="IDIgr", referencedColumnName="IDIgr")
	 * })
	 */
	private $idigr;
	
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
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=1, nullable=false)
     */
    private $status;
    

    /**
     * Constructor
     */
    public function __construct()
    {
    }
    
     /**
     * Set idigr
     *
     * @param \Igra $igr
     * @return Osvajanje
     */
    public function setIdigr($idigr)
    {
    	$this->idigr = $idigr;
    	return $this;
    }
    
    /**
     * Get idigr
     *
     * @return \Igra
     */
    public function getIdigr()
    {
        return $this->idigr;
    }
    
    /**
     * Set idobl
     *
     * @param \Oblast $idobl
     * @return Osvajanje
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
     * Set status
     *
     * @param string $status
     * @return Osvajanje
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


}