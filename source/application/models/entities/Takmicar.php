<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Takmicar
 *
 * @ORM\Table(name="takmicar")
 * @ORM\Entity
 */
class Takmicar
{
    /**
     * @var string
     *
     * @ORM\Column(name="Ime", type="string", length=20, nullable=false)
     */
    private $ime;

    /**
     * @var string
     *
     * @ORM\Column(name="Prezime", type="string", length=20, nullable=false)
     */
    private $prezime;

    /**
     * @var string
     *
     * @ORM\Column(name="Slika", type="string", length=50, nullable=true)
     */
    private $slika;

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
     * Set ime
     *
     * @param string $ime
     * @return Takmicar
     */
    public function setIme($ime)
    {
        $this->ime = $ime;
    
        return $this;
    }

    /**
     * Get ime
     *
     * @return string 
     */
    public function getIme()
    {
        return $this->ime;
    }

    /**
     * Set prezime
     *
     * @param string $prezime
     * @return Takmicar
     */
    public function setPrezime($prezime)
    {
        $this->prezime = $prezime;
    
        return $this;
    }

    /**
     * Get prezime
     *
     * @return string 
     */
    public function getPrezime()
    {
        return $this->prezime;
    }

    /**
     * Set slika
     *
     * @param string $slika
     * @return Takmicar
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
     * Set idkor
     *
     * @param \RegKorisnik $idkor
     * @return Takmicar
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