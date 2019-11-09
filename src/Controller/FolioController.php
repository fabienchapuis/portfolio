<?php

namespace App\Controller;


use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FolioController extends AbstractController
{



/**
 * @Route("/folio", name="folio")
 * @param PropertyRepository $repository
 * @return Response
 */
public function index(PropertyRepository $repository): Response
{
    $properties = $repository->findAll();
    
    return $this->render('folio.html.twig',[
        'properties' => $properties
    ]);
}






}