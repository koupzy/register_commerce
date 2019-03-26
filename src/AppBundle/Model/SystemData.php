<?php

namespace AppBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/01/19
 * Time: 14:18
 * @ORM\Entity()
 */
trait SystemData
{
    /**
     * @var integer $id
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \DateTime $dateCreat;
     * @ORM\Column(type="datetime")
     */
    protected $dateCreat;

    /**
     * @var \DateTime $dateModif
     * @ORM\Column(type="datetime")
     */
    protected $dateModif;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreat(): \DateTime
    {
        return $this->dateCreat;
    }

    /**
     * @param \DateTime $dateCreat
     */
    public function setDateCreat(\DateTime $dateCreat)
    {
        $this->dateCreat = $dateCreat;
    }

    /**
     * @return \DateTime
     */
    public function getDateModif(): \DateTime
    {
        return $this->dateModif;
    }

    /**
     * @param \DateTime $dateModif
     */
    public function setDateModif(\DateTime $dateModif)
    {
        $this->dateModif = $dateModif;
    }




}