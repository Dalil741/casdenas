<?php

namespace App\Controller;

use App\Entity\Demande;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemandeNonConfirmeesController extends AbstractController
{
    #[Route('/demande/non/confirmees', name: 'app_demande_non_confirmees')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $demandenonconfirmees = $doctrine->getRepository(Demande::class)->findBy(['dateConfirmation' => $this->getDateConfirmation()]);
        return $this->render('demande_non_confirmees/index.html.twig', [
            'controller_name' => 'DemandeNonConfirmeesController',
        ]);
    }
}
