<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Deal;
use App\Form\DealType;
use App\Repository\DealRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class DealController extends AbstractController
{
    /**
     * @Route("/deal/list", name="deal_list")
     */
    public function index(EntityManagerInterface $em)
    {
        $repo = $em->getRepository(Deal::class);
        $repo_cat = $em->getRepository(Category::class);
        $deals = $repo->findAll();
        $categories = $repo_cat->findAll();

        return $this->render('deal/index.html.twig', ['deals' => $deals, 'categories' => $categories]);
    }
    

    /**
     * @Route("/deal/toggle/{index}",name="toggle", requirements={"index": "\d+"})
     */
    public function toggleEnableAction($index)
    {
        $repo = $this->getDoctrine()->getRepository('App:Deal');
        $dealId = $repo->find($index);

        if($dealId)
        {
            return new Response("BRAVO ! L'id existe dans la BDD");
        }else{
            return new Response("L'ID n'existe pas dans la BDD");
        }
    }

    /**
     * @Route("/deal/formulaire", name="deal_formulaire", methods={"GET","POST"})
     */
    public function create(Request $req, EntityManagerInterface $em, LoggerInterface $logger)
    {
        $deal = new Deal;
        $form = $this->createForm(DealType::class, $deal);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($deal);
            $em->flush();
            $lastID = $deal->getId();
            $this->addFlash('success', 'Le deal '.$lastID. ' a bien été crée !');
            $logger->info('Le log s\'affiche bien :D');
            return $this->redirectToRoute('deal_list');
        }

        return $this->render('deal/formulaire.html.twig', [
            'form' => $form->createView()
        ]);
    }
}