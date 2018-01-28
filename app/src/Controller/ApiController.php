<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/catalog", name="api_catalog")
     */
    public function apiCatalog()
    {
        $catalog = [
            'get_agendas'   => '/api/agendas',
            'get_agenda'    => '/api/agendas/{uuid}',
        ];

        return $this->json($catalog);
    }
}
