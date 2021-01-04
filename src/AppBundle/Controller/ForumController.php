<?php
namespace AppBundle\Controller;

use AppBundle\Entity\ForumTopic;
use AppBundle\Form\TopicType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ForumController extends Controller
{
    /**
     * @Route("/forum/{forumid}", name="forum")
     */
    public function indexAction($forumid, Request $request)
    {
        // replace this example code with whatever you need
        //$res=phpinfo();
        $user = $this->getUser();
        $forum= $this->getDoctrine()->getRepository('AppBundle:Forum')->findBy(['id'=>$forumid]);

        $topics= $this->getDoctrine()->getRepository('AppBundle:ForumTopic')->findBy(['forumid'=>$forumid]);
        $topic=new ForumTopic();
        $topic->setForumid($forum[0]);
        $topic->setCreatedby($user);
        $topic->setPostscount(0);
        //$form=null;
        $form=$this->createForm(TopicType::class,$topic);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Save
            //dump($topic);
            //die;
            $em = $this->getDoctrine()->getManager();
            $em->persist($topic);
            $em->flush();

            return $this->redirectToRoute('forum',['forumid'=>$forumid]);
        }

        //dump($form);
        //die;
        return $this->render('@App/topics/topics.html.twig',['newtopic_form'=>$form->createView(),'forum'=>$forum[0],'itemslist'=>$topics,]);
    }
}