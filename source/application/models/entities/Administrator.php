<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Administrator
 *
 * @ORM\Table(name="administrator")
 * @ORM\Entity
 */
class Administrator
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
     * @return Administrator
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