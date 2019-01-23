<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

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
    /**
     * @var integer $id
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $enseigne
     * @ORM\Column(type="string")
     */
    private $enseigne;

    /**
     * @var string $nomCommercial
     * @ORM\Column(type="string")
     */
    private $nomCommercial;

    /**
     * @var Date $dateDebut
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @var string $numeroRCCM
     * @ORM\Column(type="string")
     */
    private $numeroRCCM;

    /**
     * @var integer $nbSalarie
     * @ORM\Column(type="integer")
     */
    private $nbSalarie;

    /**
     * @var string $addresseReelle
     * @ORM\Column(type="string")
     */
    private $addresseReelle;

    /**
     * @var string $addressePostal
     * @ORM\Column(type="string")
     */
    private $addressePostal;

    /**
     * @var string $origine
     * @ORM\Column(type="string")
     */
    private $origine;

    /**
     * @var array $precExpt
     * @ORM\Column(type="array")
     */
    private $precExpt;

    /**
     * @var array $loueurFonds
     * @ORM\Column(type="array")
     */
    private $loueurFonds;

    /**
     * @var array $etablissement
     * @ORM\Column(type="array")
     */
    private $etablissement;

    /**
     * @var array $activite_ant
     * @ORM\Column(type="array")
     */
    private $activite_ant;

    /**
     * @var array $secondOuvert
     * @ORM\Column(type="array")
     */
    private $engageurs;

}