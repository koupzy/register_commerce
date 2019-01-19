<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * Created by PhpStorm.
 * User: koupzy
 * Date: 29/12/18
 * Time: 10:56
 *
 * @ORM\Entity()
 * @ORM\Table()
 */
class User extends BaseUser
{
    /**
     * @ORM\Column()
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $firstName
     */
    protected $firstName;

    /**
     * @var string $lastName
     */
    protected $lastName;

    /**
     * @var string $phone
     */
    protected $phone;

    /**
     * User constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }



}