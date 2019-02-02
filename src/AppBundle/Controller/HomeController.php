<?php
/**
 * Created by PhpStorm.
 * User: koupzy
 * Date: 24/01/19
 * Time: 20:08
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('@App/pages/index.html.twig');
    }

}