<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FolioController extends AbstractController
{
/**
 * @Route("/folio", name="folio")
 * 
 */
public function index()
{
    return $this->render('folio.html.twig');
}






}