<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Entity\Contact;
use App\Notification\ContactNotification;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
/**
 * @Route("/contact", name="contact")
 *  @return Response
 */
public function index(Request $request,ContactNotification $notification): Response
{
    $contact = new Contact();
    
    $form = $this->createForm(ContactType::class, $contact);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()){
        $notification->notify($contact);
        $this->addFlash('success','Votre email a bien été envoyé');
        
    return $this->redirectToRoute('contact.html.twig',[
        'form' => $form->createView()]);
    
        }
}}