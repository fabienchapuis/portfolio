<?php

namespace App\Controller;



use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Contact;
use App\Form\ContactType;

class ContactController extends AbstractController
{



/**
 * @Route("/contact", name="contact")
 * 
 */
public function index(Request $request){

    $em =$this->getDoctrine()->getManager();
    $contact = new Contact();
    $form = $this->createForm(ContactType::class, $contact);

    if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){

        $em->persist($contact);
        $em->flush();
    }

    return $this->render('contact.html.twig', [
        
        'form' => $form->createView()
    ]);
}






}