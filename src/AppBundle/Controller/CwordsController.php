<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CenzorWord;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\CenzorWords;
use AppBundle\Form\CenzorWordsType;

class CwordsController extends Controller
{
    /**
     * @Route("/cwordlist", name="cwordlist")
     */
    public function indexAction(Request $request)
    {

        $wlist=$this->getDoctrine()->getRepository('AppBundle:CenzorWord')->findAll();
        //dump($wlist);
        //die;
        //return $this->render('@App/cwordlist/cwordlist.html.twig',['itemslist'=>$wlist]);
        $zlist=new CenzorWords();
        foreach ($wlist as $w){
            $nw= new CenzorWord();
            $nw->setCword($w->getCword());
            $zlist->getWords()->add($nw);

        }

        $form = $this->createForm(CenzorWordsType::class, $zlist);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //dump($zlist->getWords());
            //die;
            $em = $this->getDoctrine()->getManager();
            //$req=$em->createQuery('DELETE AppBundle:CenzorWord');
            //$req->getResult();
            //$em->flush();

            foreach ($wlist as $w){
                $dw = $em->getReference('AppBundle:CenzorWord', $w->getId());
                $em->remove($dw);
                $em->flush();
            }
            //dump($zlist->getWords());
            //die;

            $zid=0;
            foreach ($zlist->getWords() as $w){

                if(!empty($w->getCword())){
                    $zid++;
                    $w->setId($zid);
                    $em->persist($w);
                    $em->flush();
                }

            }

            return $this->redirectToRoute('homepage');
        }

        return $this->render('@App/cwordlist/cwordlist.html.twig', [
            'form' => $form->createView(),
        ]);

    }


}