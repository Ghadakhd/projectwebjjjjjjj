

<?php
class User {
    private ?int $iduser;
    private ?string $username;
    private ?string $email;
    private ?string $password; // Hashed password
    private ?string $first_name;
    private ?string $last_name;
    private ?string $date_of_birth; // New field for date of birth

    // Constructor
    public function __construct(
        ?int $iduser,
        ?string $username,
        ?string $email,
        ?string $password,
        ?string $first_name,
        ?string $last_name,
        ?string $date_of_birth = null
    ) {
        $this->iduser = $iduser;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->date_of_birth = $date_of_birth;
    }

    // Getters and Setters

    public function getIdUser(): ?int {
        return $this->iduser;
    }

    public function setIdUser(?int $iduser): void {
        $this->iduser = $iduser;
    }

    public function getUsername(): ?string {
        return $this->username;
    }

    public function setUsername(?string $username): void {
        $this->username = $username;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(?string $email): void {
        $this->email = $email;
    }

    public function getPassword(): ?string {
        return $this->password;
    }

    public function setPassword(?string $password): void {
        $this->password = $password;
    }

    public function getFirstName(): ?string {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): void {
        $this->first_name = $first_name;
    }

    public function getLastName(): ?string {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): void {
        $this->last_name = $last_name;
    }

    public function getDateOfBirth(): ?string {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(?string $date_of_birth): void {
        $this->date_of_birth = $date_of_birth;
    }
}
?>
