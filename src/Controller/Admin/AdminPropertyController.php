<?php
namespace App\Controller\Admin;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AdminPropertyController extends AbstractController{

/**
 * @var PropertyRepository
 * 
 */
    private $repository;


/**
 * 
 * @var ObjectManager
 */
    private $em;


    public function __construct(PropertyRepository $repository, ObjectManager $em)
        {
            $this->repository = $repository;
            $this->em =$em;
        }


/**
 * @Route("/admin", name="admin.property.index")
 * @return \Symfony\Component\HttpFoundation\Response
 */

    public function index()
    {
        $properties = $this->repository->findAll();
        return $this->render('admin/property/index.html.twig',compact('properties'));
    }

/**
 * @Route("/admin/{id}" , name="admin.property.edit")
 * @param Property $property
 * @param Resquest $request
 * @return \Symfony\Component\HttpFoundation\Response
 */

    public function edit(Property $property, Request $request)
    {
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            return $this->redirectToRoute('admin.property.index');
        }


        return $this->render('admin/property/edit.html.twig',[
            'property' => $property,
            'form' => $form->createView()
        ]);
    }



}