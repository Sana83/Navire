<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AisShipTypeRepository;

class AisShipTypeController extends AbstractController
{
    
    
    /**
     * @Route("/voirtous", name="voirtous")
     */
    public function voirTous(AisShipTypeController $repo): Response {
        $types = $repo->findAll();
        return $this->render('aisshiptype/voirtous.html.twig', [
            'types' => $types,
        ]);
    }
    /**
     * @Route("/aisshiptype", name="aisshiptype")
     */
    public function index(): Response
    {
        return $this->render('aisshiptype/index.html.twig', [
            'controller_name' => 'AisShipTypeController',
        ]);
    }
    
}
