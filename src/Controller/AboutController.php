<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AboutController extends AbstractController
{
/**
 * @Route("/about", name="about")
 * 
 */
public function index()
{
    return $this->render('about.html.twig');
}






}