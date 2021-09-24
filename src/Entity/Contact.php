<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{   
    /**
     * @Assert\NotBlank
     * @Assert\Length(min=3,max=15, minMessage="minErrorMessage",maxMessage="MaxErrorMessage")
     */
    private string $firstname;

    /**
     * @Assert\NotBlank
     * @Assert\Length(min=3,max=15, minMessage="minErrorMessage",maxMessage="MaxErrorMessage")
     */
    private string $lastname;

    /**
     * @Assert\NotBlank
     * @Assert\Length(min=3,max=30, minMessage="minErrorMessage",maxMessage="MaxErrorMessage")
     */
    private string $society;

    /**
     * @Assert\NotBlank
     * @Assert\Email()
     */
    private string $email;

    /**
     * @Assert\NotBlank
     * @Assert\Length(min=10,max=10, minMessage="minErrorMessage",maxMessage="MaxErrorMessage")
     */
    private string $phone;

    /**
     * @Assert\NotBlank
     * @Assert\Length(min=10,max=500, minMessage="minErrorMessage",maxMessage="MaxErrorMessage")
     */
    private string $motif;

    public function __construct()
    {
        
    }
    
    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of society
     */ 
    public function getSociety()
    {
        return $this->society;
    }

    /**
     * Set the value of society
     *
     * @return  self
     */ 
    public function setSociety($society)
    {
        $this->society = $society;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of motif
     */ 
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set the value of motif
     *
     * @return  self
     */ 
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }
}
