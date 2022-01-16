<?php

class User
{
    private string $id;
    private string $pseudo;
    private string $password;
    private string $firstname;
    private string $name;
    private string $createdAt;
    private string $record_dice;
    private string $record_Hcap;
    private string $record_Mcap;
    private string $record_Ecap;
    private string $record_guess;
    private string $record_flappy;
    private string $email;




    public function getId(): string
    {
        return $this->id;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
         $this->password = $password;
    }
    public function getPseudo(): string
    {
        return $this->pseudo;
    }
    public function getFirstname(): string
    {
        return $this->firstname;
    }
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
    public function setRecordDice($record_dice): void
    {
        $this->record_dice = $record_dice;
    }
    public function getRecordDice()
    {
        return $this->record_dice;
    }
    public function setRecordHcap($record_Hcap)
    {
        $this->record_Hcap = $record_Hcap;
    }
    public function getRecordHcap()
    {
        return $this->record_Hcap;
    }
    public function setRecordEcap($record_Ecap)
    {
        $this->record_Ecap = $record_Ecap;
    }
    public function getRecordEcap()
    {
        return $this->record_Ecap;
    }
    public function setRecordMcap($record_Mcap)
    {
        $this->record_Mcap = $record_Mcap;
    }
    public function getRecordMcap()
    {
        return $this->record_Mcap;
    }
    public function setRecordGuess($record_guess)
    {
        $this->record_guess = $record_guess;
    }
    public function getRecordGuess()
    {
        return $this->record_guess;
    }
    public function setRecordFlappy($record_flappy)
    {
        $this->record_flappy = $record_flappy;
    }
    public function getRecordFlappy()
    {
        return $this->record_flappy;
    }
    public function getEmail()
    {
        return $this->email;
    }





}