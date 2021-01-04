<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Role\Role;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        //$res=phpinfo();

         $forums = $this->getDoctrine()->getRepository('AppBundle:Forum')->findAll();
         //dump($forums);
         //die;
         return $this->render('@App/forums/forums.html.twig',['itemslist'=>$forums]);
    }

    /**
     * @Route("/zzz", name="zzz")
     */
    public function zzzAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/default/index.html.twig',['res'=>$request]);
        //return $this->json($request);
    }
}
