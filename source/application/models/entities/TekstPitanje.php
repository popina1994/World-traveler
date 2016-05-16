<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TekstPitanje
 *
 * @ORM\Table(name="tekst_pitanje")
 * @ORM\Entity
 */
class TekstPitanje
{
    /**
     * @var string
     *
     * @ORM\Column(name="Postavka", type="string", length=200, nullable=false)
     */
    private $postavka;

    /**
     * @var string
     *
     * @ORM\Column(name="Odgovor1", type="string", length=50, nullable=false)
     */
    private $odgovor1;

    /**
     * @var string
     *
     * @ORM\Column(name="Odgovor2", type="string", length=50, nullable=false)
     */
    private $odgovor2;

    /**
     * @var string
     *
     * @ORM\Column(name="Odgovor3", type="string", length=50, nullable=false)
     */
    private $odgovor3;

    /**
     * @var string
     *
     * @ORM\Column(name="Odgovor4", type="string", length=50, nullable=false)
     */
    private $odgovor4;

    /**
     * @var string
     *
     * @ORM\Column(name="TacanOdgovor", type="string", length=1, nullable=false)
     */
    private $tacanodgovor;

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
     * Set postavka
     *
     * @param string $postavka
     * @return TekstPitanje
     */
    public function setPostavka($postavka)
    {
        $this->postavka = $postavka;
    
        return $this;
    }

    /**
     * Get postavka
     *
     * @return string 
     */
    public function getPostavka()
    {
        return $this->postavka;
    }

    /**
     * Set odgovor1
     *
     * @param string $odgovor1
     * @return TekstPitanje
     */
    public function setOdgovor1($odgovor1)
    {
        $this->odgovor1 = $odgovor1;
    
        return $this;
    }

    /**
     * Get odgovor1
     *
     * @return string 
     */
    public function getOdgovor1()
    {
        return $this->odgovor1;
    }

    /**
     * Set odgovor2
     *
     * @param string $odgovor2
     * @return TekstPitanje
     */
    public function setOdgovor2($odgovor2)
    {
        $this->odgovor2 = $odgovor2;
    
        return $this;
    }

    /**
     * Get odgovor2
     *
     * @return string 
     */
    public function getOdgovor2()
    {
        return $this->odgovor2;
    }

    /**
     * Set odgovor3
     *
     * @param string $odgovor3
     * @return TekstPitanje
     */
    public function setOdgovor3($odgovor3)
    {
        $this->odgovor3 = $odgovor3;
    
        return $this;
    }

    /**
     * Get odgovor3
     *
     * @return string 
     */
    public function getOdgovor3()
    {
        return $this->odgovor3;
    }

    /**
     * Set odgovor4
     *
     * @param string $odgovor4
     * @return TekstPitanje
     */
    public function setOdgovor4($odgovor4)
    {
        $this->odgovor4 = $odgovor4;
    
        return $this;
    }

    /**
     * Get odgovor4
     *
     * @return string 
     */
    public function getOdgovor4()
    {
        return $this->odgovor4;
    }

    /**
     * Set tacanodgovor
     *
     * @param string $tacanodgovor
     * @return TekstPitanje
     */
    public function setTacanodgovor($tacanodgovor)
    {
        $this->tacanodgovor = $tacanodgovor;
    
        return $this;
    }

    /**
     * Get tacanodgovor
     *
     * @return string 
     */
    public function getTacanodgovor()
    {
        return $this->tacanodgovor;
    }

    /**
     * Set idpit
     *
     * @param \Pitanje $idpit
     * @return TekstPitanje
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