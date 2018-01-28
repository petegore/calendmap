<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Manage API route specific to Agenda
 */
class AgendaApiController extends ApiController
{
    public function getAgendas()
    {
        $agendaRepo = $this->getDoctrine()->getRepository('App:Agenda');

        if ($this->getUser()) {

        }
    }
}
