<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        return $this->render('main/map.html.twig');
    }

    /**
     * @Route("/agendas/list", name="agnedas_list")
     */
    public function listAgenda()
    {
        return $this->render('agendas/list.html.twig');
    }
}
