<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JoueurRepository")
 */
class Joueur
{

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Commentaire", cascade={"persist"}, mappedBy="joueur")
     * @ORM\JoinColumn(nullable=true)
     */
    private $commentaire;
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image", cascade={"persist"})
     * @Assert\Valid()
     */
    private $image;
    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Position", cascade={"persist"})
     * @ORM\JoinTable(name="joueur_position")
     */
    private $positions;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Club", cascade={"persist"})
     */
    private $club;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nationnalite", type="string", length=255)
     */
    private $nationnalite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var int
     * @Assert\Range(
     *      min = 120,
     *      max = 220,
     *      minMessage = "You must be at least {{ limit }}cm tall to enter",
     *      maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )
     * @ORM\Column(name="taille", type="smallint")
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="pied", type="string", length=255)
     */
    private $pied;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->positions = new \Doctrine\Common\Collections\ArrayCollection();
    }

     /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }


    /**
     * @return string
     */
    public function getNationnalite()
    {
        return $this->nationnalite;
    }

    /**
     * @param string $nationnalite
     */
    public function setNationnalite($nationnalite)
    {
        $this->nationnalite = $nationnalite;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Joueur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Joueur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Joueur
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set taille
     *
     * @param integer $taille
     *
     * @return Joueur
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return int
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set pied
     *
     * @param string $pied
     *
     * @return Joueur
     */
    public function setPied($pied)
    {
        $this->pied = $pied;

        return $this;
    }

    /**
     * Get pied
     *
     * @return string
     */
    public function getPied()
    {
        return $this->pied;
    }

    /**
     * Add position
     *
     * @param \AppBundle\Entity\Position $position
     *
     * @return Joueur
     */
    public function addPosition(\AppBundle\Entity\Position $position)
    {
        $this->positions[] = $position;

        return $this;
    }

    /**
     * Remove position
     *
     * @param \AppBundle\Entity\Position $position
     */
    public function removePosition(\AppBundle\Entity\Position $position)
    {
        $this->positions->removeElement($position);
    }

    /**
     * Get positions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * Set club
     *
     * @param \AppBundle\Entity\Club $club
     *
     * @return Joueur
     */
    public function setClub(\AppBundle\Entity\Club $club = null)
    {
        $this->club = $club;

        return $this;
    }

    /**
     * Get club
     *
     * @return \AppBundle\Entity\Club
     */
    public function getClub()
    {
        return $this->club;
    }
}
