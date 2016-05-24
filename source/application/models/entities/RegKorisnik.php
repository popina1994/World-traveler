<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * RegKorisnik
 *
 * @ORM\Table(name="reg_korisnik")
 * @ORM\Entity
 */
class RegKorisnik
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDKor", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idkor;

    /**
     * @var string
     *
     * @ORM\Column(name="Username", type="string", length=20, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=20, nullable=false)
     */
    private $password;


    /**
     * Get idkor
     *
     * @return integer 
     */
    public function getIdkor()
    {
        return $this->idkor;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return RegKorisnik
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return RegKorisnik
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
    
 
}