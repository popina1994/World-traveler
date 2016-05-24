<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * LicnostPitanje
 *
 * @ORM\Table(name="licnost_pitanje")
 * @ORM\Entity
 */
class LicnostPitanje
{
    /**
     * @var string
     *
     * @ORM\Column(name="Licnost", type="string", length=50, nullable=false)
     */
    private $licnost;

    /**
     * @var string
     *
     * @ORM\Column(name="Slika", type="string", length=50, nullable=false)
     */
    private $slika;

    /**
     * @var string
     *
     * @ORM\Column(name="Podatak1", type="string", length=200, nullable=false)
     */
    private $podatak1;

    /**
     * @var string
     *
     * @ORM\Column(name="Podatak2", type="string", length=200, nullable=false)
     */
    private $podatak2;

    /**
     * @var string
     *
     * @ORM\Column(name="Podatak3", type="string", length=200, nullable=false)
     */
    private $podatak3;

    /**
     * @var string
     *
     * @ORM\Column(name="Podatak4", type="string", length=200, nullable=false)
     */
    private $podatak4;

    /**
     * @var string
     *
     * @ORM\Column(name="Podatak5", type="string", length=200, nullable=false)
     */
    private $podatak5;

    /**
     * @var string
     *
     * @ORM\Column(name="Podatak6", type="string", length=200, nullable=true)
     */
    private $podatak6;

    /**
     * @var \Pitanje
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Pitanje")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDPit", referencedColumnName="IdPit")
     * })
     */
    private $idpit;


    /**
     * Set licnost
     *
     * @param string $licnost
     * @return LicnostPitanje
     */
    public function setLicnost($licnost)
    {
        $this->licnost = $licnost;
    
        return $this;
    }

    /**
     * Get licnost
     *
     * @return string 
     */
    public function getLicnost()
    {
        return $this->licnost;
    }

    /**
     * Set slika
     *
     * @param string $slika
     * @return LicnostPitanje
     */
    public function setSlika($slika)
    {
        $this->slika = $slika;
    
        return $this;
    }

    /**
     * Get slika
     *
     * @return string 
     */
    public function getSlika()
    {
        return $this->slika;
    }

    /**
     * Set podatak1
     *
     * @param string $podatak1
     * @return LicnostPitanje
     */
    public function setPodatak1($podatak1)
    {
        $this->podatak1 = $podatak1;
    
        return $this;
    }

    /**
     * Get podatak1
     *
     * @return string 
     */
    public function getPodatak1()
    {
        return $this->podatak1;
    }

    /**
     * Set podatak2
     *
     * @param string $podatak2
     * @return LicnostPitanje
     */
    public function setPodatak2($podatak2)
    {
        $this->podatak2 = $podatak2;
    
        return $this;
    }

    /**
     * Get podatak2
     *
     * @return string 
     */
    public function getPodatak2()
    {
        return $this->podatak2;
    }

    /**
     * Set podatak3
     *
     * @param string $podatak3
     * @return LicnostPitanje
     */
    public function setPodatak3($podatak3)
    {
        $this->podatak3 = $podatak3;
    
        return $this;
    }

    /**
     * Get podatak3
     *
     * @return string 
     */
    public function getPodatak3()
    {
        return $this->podatak3;
    }

    /**
     * Set podatak4
     *
     * @param string $podatak4
     * @return LicnostPitanje
     */
    public function setPodatak4($podatak4)
    {
        $this->podatak4 = $podatak4;
    
        return $this;
    }

    /**
     * Get podatak4
     *
     * @return string 
     */
    public function getPodatak4()
    {
        return $this->podatak4;
    }

    /**
     * Set podatak5
     *
     * @param string $podatak5
     * @return LicnostPitanje
     */
    public function setPodatak5($podatak5)
    {
        $this->podatak5 = $podatak5;
    
        return $this;
    }

    /**
     * Get podatak5
     *
     * @return string 
     */
    public function getPodatak5()
    {
        return $this->podatak5;
    }

    /**
     * Set podatak6
     *
     * @param string $podatak6
     * @return LicnostPitanje
     */
    public function setPodatak6($podatak6)
    {
        $this->podatak6 = $podatak6;
    
        return $this;
    }

    /**
     * Get podatak6
     *
     * @return string 
     */
    public function getPodatak6()
    {
        return $this->podatak6;
    }

    /**
     * Set idpit
     *
     * @param \Pitanje $idpit
     * @return LicnostPitanje
     */
    public function setIdpit(\Pitanje $idpit)
    {
        $this->idpit = $idpit;
    
        return $this;
    }

    /**
     * Get idpit
     *
     * @return \Pitanje 
     */
    public function getIdpit()
    {
        return $this->idpit;
    }
}