<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 3,
     *      max = 20,
     *      minMessage = "Votre nom doit comporter au moins {{ limit }} caractères",
     *      maxMessage = "Votre nom doit comporter au maximum {{ limit }} caractères"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 3,
     *      max = 20,
     *      minMessage = "Votre prenom doit comporter au moins {{ limit }} caractères",
     *      maxMessage = "Votre prenom doit comporter au maximum {{ limit }} caractères"
     * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank
     * @Assert\LessThan("today",
     * message = "Votre date de naissance doit être inférieure à la date du jour : {{ compared_value }} ")
     * @Assert\GreaterThan("01/01/1901",
     * message = "Votre date de naissance doit être supérieure à {{ compared_value }}")
     */
    private $dateDeNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 3,
     *      max = 20,
     *      minMessage = "Votre login doit comporter au moins {{ limit }} caractères",
     *      maxMessage = "Votre login doit comporter au maximum {{ limit }} caractères"
     * )
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 8,
     *      minMessage = "Votre mot de passe doit comporter au moins {{ limit }} caractères",
     * )
     */
    private $password;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }
}
