<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/01/19
 * Time: 13:57
 */

namespace AppBundle\Entity;

use AppBundle\Model\SystemData;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Class Etablissement
 * @package AppBundle\Entity
 * @ORM\Entity()
 * @ORM\Table()
 */
class Etablissement
{
    use SystemData;

    /**
     * @var string $localisation
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="veuillez saisir ce champ")
     * @Assert\NotNull(message="ce champ est obligatoire")
     */
    private $localisation;

    /**
     * @var string $adressePostal
     * @ORM\Column(type="string")
     */
    private $adressePostal;

    /**
     * @var string $origine
     * @ORM\Column(type="string" ,columnDefinition="ENUM('Création, Achat, Apport, Prise en location gérance, Autre')"
     */
    private $origine;

    /**
     * @var array $precExploit
     * @ORM\Column(type="array")
     */
    private $precExploit;

    /**
     * @var array $loueurFond
     * @ORM\Column(type="array")
     */
    private $loueurFond;

    /**
     * @var string $etatModif
     * @ORM\Column(type="string", columnDefinition="ENUM('TRANSFERE, ACHETE, VENDU, FERME, MODIFIE, AUTRE, AUCUN')", options={"default":"AUCUN"})
     */
    private $etatModif;

    /**
     * @var boolean $principale
     * @ORM\Column(type="boolean")
     * @Assert\Type(type="boolean", message="cette valeur {{ value }} n'est pas du type {{ type }}")
     */
    private $principale;

    /**
     * @var Activity $activity
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Activity", inversedBy="etablissements", cascade={"persist", "merge", "delete"})
     */
    private $activity;

    /**
     * Etablissement constructor.
     * @internal param array $precExploit
     * @internal param array $loueurFond
     * @internal param bool $principale
     */
    public function __construct()
    {
        $this->precExploit = array();
        $this->loueurFond = array();
        $this->principale = false;
        $this->dateCreat = new \DateTime('now');
        $this->dateModif = new \DateTime('now');
    }

    /**
     * @return string
     */
    public function getLocalisation(): string
    {
        return $this->localisation;
    }

    /**
     * @param string $localisation
     */
    public function setLocalisation(string $localisation)
    {
        $this->localisation = $localisation;
    }

    /**
     * @return string
     */
    public function getAdressePostal(): string
    {
        return $this->adressePostal;
    }

    /**
     * @param string $adressePostal
     */
    public function setAdressePostal(string $adressePostal)
    {
        $this->adressePostal = $adressePostal;
    }

    /**
     * @return string
     */
    public function getOrigine(): string
    {
        return $this->origine;
    }

    /**
     * @param string $origine
     */
    public function setOrigine(string $origine)
    {
        $this->origine = $origine;
    }

    /**
     * @return array
     */
    public function getPrecExploit(): array
    {
        return $this->precExploit;
    }

    /**
     * @param array $precExploit
     */
    public function setPrecExploit(array $precExploit)
    {
        $this->precExploit = $precExploit;
    }

    /**
     * @return array
     */
    public function getLoueurFond(): array
    {
        return $this->loueurFond;
    }

    /**
     * @param array $loueurFond
     */
    public function setLoueurFond(array $loueurFond)
    {
        $this->loueurFond = $loueurFond;
    }

    /**
     * @return string
     */
    public function getEtatModif(): string
    {
        return $this->etatModif;
    }

    /**
     * @param string $etatModif
     */
    public function setEtatModif(string $etatModif)
    {
        $this->etatModif = $etatModif;
    }

    /**
     * @return bool
     */
    public function isPrincipale(): bool
    {
        return $this->principale;
    }

    /**
     * @param bool $principale
     */
    public function setPrincipale(bool $principale)
    {
        $this->principale = $principale;
    }

    /**
     * @return Activity
     */
    public function getActivity(): Activity
    {
        return $this->activity;
    }

    /**
     * @param Activity $activity
     */
    public function setActivity(Activity $activity)
    {
        $this->activity = $activity;
    }




}