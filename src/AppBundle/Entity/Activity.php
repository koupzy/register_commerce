<?php

namespace AppBundle\Entity;

use AppBundle\Model\SystemData;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Created by PhpStorm.
 * User: koupzy
 * Date: 16/12/18
 * Time: 20:39
 * @ORM\Entity()
 * @ORM\Table()
 */
class Activity
{
    use SystemData;

    /**
     * @var string $enseigne
     * @ORM\Column(type="string")
     * @Assert\NotNull(message="ce champ est obligatoire ")
     * @Assert\NotBlank(message="veuillez saisir ce champ")
     */
    private $enseigne;

    /**
     * @var string $nomCom
     * @ORM\Column(type="string")
     * @Assert\NotNull(message="ce champ est obligatoire ")
     * @Assert\NotBlank(message="veuillez saisir ce champ")
     */
    private $nomCom;

    /**
     * @var string $activite
     * @ORM\Column(type="string")
     * @Assert\NotNull(message="ce champ est obligatoire ")
     * @Assert\NotBlank(message="veuillez saisir ce champ")
     */
    private $activite;

    /**
     * @var boolean $transfert
     * @ORM\Column(type="boolean")
     * @Assert\Type(type="boolean", message="cette valeur {{value}} n'est pas de type {{type}}")
     */
    private $transfert;

    /**
     * @var \DateTime $dateDebut
     * @ORM\Column(type="datetime")
     * @Assert\NotNull(message="ce champ est obligatoire ")
     * @Assert\NotBlank(message="veuillez saisir ce champ")
     * @Assert\Type(type="DateTime", message="le format de la date n'est pas correcte ")
     */
    private $dateDebut;

    /**
     * @var string $numeroRccm
     * @ORM\Column(type="string")
     * @Assert\NotNull(message="ce champ est obligatoire ")
     * @Assert\NotBlank(message="veuillez saisir ce champ")
     */
    private $numeroRccm;

    /**
     * @var integer $nbreSalarie
     * @ORM\Column(type="integer")
     * @Assert\NotNull(message="ce champ est obligatoire ")
     * @Assert\NotBlank(message="veuillez saisir ce champ")
     * @Assert\Type(type="integer")
     */
    private $nbreSalarie;

    /**
     * @var array $engageurs
     * @ORM\Column(type="array")
     */
    private $engageurs;

    /**
     * @var Exploitant $exploitant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Exploitant", inversedBy="activities", cascade={"persist", "merge", "remove" })
     */
    private $exploitant;

    /**
     * @var Collection $etablissements
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Etablissement", mappedBy="activity")
     */
    private $etablissements;

    /**
     * Activity constructor.
     * @internal param bool $transfert
     * @internal param array $engageurs
     * @internal param Collection $etablissements
     */
    public function __construct()
    {
        $this->transfert = false;
        $this->engageurs = Array();
        $this->etablissements = new ArrayCollection();
        $this->dateCreat = new \DateTime('now');
        $this->dateModif = new \DateTime('now');
    }

    /**
     * @return string
     */
    public function getEnseigne(): ?string
    {
        return $this->enseigne;
    }

    /**
     * @param string $enseigne
     */
    public function setEnseigne(string $enseigne)
    {
        $this->enseigne = $enseigne;
    }

    /**
     * @return string
     */
    public function getNomCom(): ?string
    {
        return $this->nomCom;
    }

    /**
     * @param string $nomCom
     */
    public function setNomCom(string $nomCom)
    {
        $this->nomCom = $nomCom;
    }

    /**
     * @return string
     */
    public function getActivite(): ?string
    {
        return $this->activite;
    }

    /**
     * @param string $activite
     */
    public function setActivite(string $activite)
    {
        $this->activite = $activite;
    }

    /**
     * @return bool
     */
    public function isTransfert(): bool
    {
        return $this->transfert;
    }

    /**
     * @param bool $transfert
     */
    public function setTransfert(bool $transfert)
    {
        $this->transfert = $transfert;
    }

    /**
     * @return \DateTime
     */
    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }

    /**
     * @param \DateTime $dateDebut
     */
    public function setDateDebut(\DateTime $dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return string
     */
    public function getNumeroRccm(): ?string
    {
        return $this->numeroRccm;
    }

    /**
     * @param string $numeroRccm
     */
    public function setNumeroRccm(string $numeroRccm)
    {
        $this->numeroRccm = $numeroRccm;
    }

    /**
     * @return int
     */
    public function getNbreSalarie(): ?int
    {
        return $this->nbreSalarie;
    }

    /**
     * @param int $nbreSalarie
     */
    public function setNbreSalarie(int $nbreSalarie)
    {
        $this->nbreSalarie = $nbreSalarie;
    }

    /**
     * @return array
     */
    public function getEngageurs(): array
    {
        return $this->engageurs;
    }

    /**
     * @param array $engageurs
     */
    public function setEngageurs(array $engageurs)
    {
        $this->engageurs = $engageurs;
    }

    /**
     * @return Exploitant
     */
    public function getExploitant(): ?Exploitant
    {
        return $this->exploitant;
    }

    /**
     * @param Exploitant $exploitant
     */
    public function setExploitant(Exploitant $exploitant)
    {
        $this->exploitant = $exploitant;
    }

    /**
     * @return Collection
     */
    public function getEtablissements(): Collection
    {
        return $this->etablissements;
    }

    public function addEtablissement(Etablissement $etablissement)
    {
        if (!$this->etablissements->contains($etablissement)){
            $this->etablissements->add($etablissement);
        }
        return $this;
    }

    public function removeEtablissement(Etablissement $etablissement)
    {
        if ($this->etablissements->contains($etablissement)){
            $this->etablissements->removeElement($etablissement);
        }
        return $this;
    }

    /**
     * @param Collection $etablissements
     * @return $this
     */
    public function setEtablissements(Collection $etablissements)
    {
        $this->etablissements = new ArrayCollection();
        foreach ($etablissements as $etablissement){
            $this->addEtablissement($etablissement);
        }
        return $this;
    }

}