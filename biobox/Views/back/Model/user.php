<?php
class user
{
    private  $idUtilisateur;
    private  $firstName;
    private  $lastName;
    private  $email;
    private  $password;
    private  $confirmPassword;
    private  $type;
    public function __construct(int $id = null, string $firstName,string $lastName,string $email,string $password,string $confirmPassword, $type = 'client')
    {
        $this->idUtilisateur = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->type = $type;
    }

    public function getIdUtilisateur(): int
    {
        return $this->idUtilisateur;
    }


    public function getFirstName(): string
    {
        return $this->firstName;
    }

    
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }


    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    
    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }


    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }
}