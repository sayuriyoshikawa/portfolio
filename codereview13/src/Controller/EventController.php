<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Event;

class EventController extends AbstractController
{
    #[Route('/', name: 'event')]
    public function index(): Response
    {
        $events = $this->getDoctrine()->getRepository('App:Event')->findAll();
     
       return $this->render('event/index.html.twig', array('events'=>$events));
    }

    #[Route("/create", name:"event_create")]
    public function create(Request $request): Response
    {
         // Here we create an object from the class that we made
         $event = new Event;
         /* Here we will build a form using createFormBuilder and inside this function we will put our object and then we write add then we select the input type then an array to add an attribute that we want in our input field */
                 $form = $this->createFormBuilder($event)->add('name', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('time', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:5px')))
                 ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('picture', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('capacity', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('email', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('phone', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('address', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('url', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('type', ChoiceType::class, array('choices'=>array('music'=>'music', 'sport'=>'sport', 'festival'=>'festival', 'education'=>'education', 'health'=>'health', 'arts'=>'arts', 'fashion'=>'fashion', 'other'=>'other'),'attr' => array('class'=> 'form-control form-control-sm mb-5', 'style'=>'margin-botton:5px')))
                 
                 ->add('save', SubmitType::class, array('label'=> 'Create event', 'attr' => array('class'=> ' btn btn-outline-danger', 'style'=>'margin-bottom:15px')))

                 ->getForm();
                 $form->handleRequest($request);

                 if($form->isSubmitted() && $form->isValid()){

                    // taking the data from the inputs by the name of the inputs then getData() function        
                    $name = $form['name']->getData();
                    $time = $form['time']->getData();        
                    $description = $form['description']->getData();
                    $picture = $form['picture']->getData();
                    $capacity = $form['capacity']->getData();
                    $email = $form['email']->getData();
                    $phone = $form['phone']->getData();
                    $address = $form['address']->getData();
                    $url = $form['url']->getData();
                    $type = $form['type']->getData();
                    // Here we will get the current date

        /* these functions we bring from our entities, every column have a set function and we put the value that we get from the form */
        
                    $event->setName($name);
                    $event->setTime($time);
                    $event->setDescription($description);
                    $event->setPicture($picture);
                    $event->setCapacity($capacity);
                    $event->setEmail($email);
                    $event->setPhone($phone);
                    $event->setAddress($address);
                    $event->setUrl($url);
                    $event->setType($type);
        
                    $em = $this->getDoctrine()->getManager();
        
                    $em->persist($event);
        
                    $em->flush();
        
                    $this->addFlash(
                            'notice',
                            'Event Added'
                            );
                    return $this->redirectToRoute('event');
                }
        
         /* now to make the form we will add this line form->createView() and now you can see the form in create.html.twig file  */
        
                return $this->render('event/create.html.twig', array('form' => $form->createView()));

                
    }

    #[Route("/edit/{id}", name:"event_edit")]
    public function edit(Request $request, $id): Response
    {
        $event = $this->getDoctrine()->getRepository('App:Event')->find($id);

        $form = $this->createFormBuilder($event)->add('name', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('time', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:5px')))
                 ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('picture', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('capacity', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('email', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('phone', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('address', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('url', TextType::class, array('attr' => array('class'=> 'form-control form-control-sm', 'style'=>'margin-bottom:5px')))
                 ->add('type', ChoiceType::class, array('choices'=>array('music'=>'music', 'sport'=>'sport', 'festival'=>'festival', 'education'=>'education', 'health'=>'health', 'arts'=>'arts', 'fashion'=>'fashion', 'other'=>'other'),'attr' => array('class'=> 'form-control form-control-sm mb-5', 'style'=>'margin-botton:5px')))
                 
                 ->add('save', SubmitType::class, array('label'=> 'Update event', 'attr' => array('class'=> 'btn btn-outline-dark', 'style'=>'margin-bottom:15px')))

                 ->getForm();
                 $form->handleRequest($request);

                 if($form->isSubmitted() && $form->isValid()){
                 $name = $form['name']->getData();
                    $time = $form['time']->getData();        
                    $description = $form['description']->getData();
                    $picture = $form['picture']->getData();
                    $capacity = $form['capacity']->getData();
                    $email = $form['email']->getData();
                    $phone = $form['phone']->getData();
                    $address = $form['address']->getData();
                    $url = $form['url']->getData();
                    $type = $form['type']->getData();
                    
                    $em = $this->getDoctrine()->getManager();
                    $event->setName($name);
                    $event->setTime($time);
                    $event->setDescription($description);
                    $event->setPicture($picture);
                    $event->setCapacity($capacity);
                    $event->setEmail($email);
                    $event->setPhone($phone);
                    $event->setAddress($address);
                    $event->setUrl($url);
                    $event->setType($type);
        
                    $em->flush();
           $this->addFlash(
                   'notice',
                   'Event Updated'
                   );
           return $this->redirectToRoute('event');
       }
       return $this->render('event/edit.html.twig', array('event' => $event, 'form' => $form->createView())); 
    }

    #[Route("/details/{id}", name:"event_details")]
    public function details($id): Response
    {
        $event = $this->getDoctrine()->getRepository('App:Event')->find($id);
       return $this->render('event/details.html.twig', array('event' => $event));
    }

    #[Route("/delete/{id}", name:"event_delete")]
    public function delete($id){
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('App:Event')->find($id);
        $em->remove($event);
        $em->flush();
        $this->addFlash(
            'notice',
            'event Removed'
        );
        return $this->redirectToRoute('event');
    }

    #[Route("/music", name:"type_music")]
    public function music(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);
        $events = $repository->findBy(['type' => 'music']);
       return $this->render('eventtype/music.html.twig', array('events'=>$events));
    }

    #[Route("/arts", name:"type_arts")]
    public function arts(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);
        $events = $repository->findBy(['type' => 'arts']);
       return $this->render('eventtype/arts.html.twig', array('events'=>$events));
    }

    #[Route("/education", name:"type_education")]
    public function education(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);
        $events = $repository->findBy(['type' => 'education']);
       return $this->render('eventtype/education.html.twig', array('events'=>$events));
    }

    #[Route("/fashion", name:"type_fashion")]
    public function fashion(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);
        $events = $repository->findBy(['type' => 'fashion']);
       return $this->render('eventtype/fashion.html.twig', array('events'=>$events));
    }

    #[Route("/festival", name:"type_festival")]
    public function festival(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);
        $events = $repository->findBy(['type' => 'festival']);
       return $this->render('eventtype/festival.html.twig', array('events'=>$events));
    }

    #[Route("/health", name:"type_health")]
    public function health(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);
        $events = $repository->findBy(['type' => 'health']);
       return $this->render('eventtype/health.html.twig', array('events'=>$events));
    }

    #[Route("/sport", name:"type_sport")]
    public function sport(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);
        $events = $repository->findBy(['type' => 'sport']);
       return $this->render('eventtype/sport.html.twig', array('events'=>$events));
    }
    
    #[Route("/other", name:"type_other")]
    public function other(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);
        $events = $repository->findBy(['type' => 'other']);
       return $this->render('eventtype/other.html.twig', array('events'=>$events));
    }

}
