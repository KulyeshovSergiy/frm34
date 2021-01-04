<?php
namespace AppBundle\Controller;

use AppBundle\Entity\ForumPost;
use AppBundle\Form\ForumPostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TopicController extends Controller
{
    /**
     * @Route("/topic/{topicid}", name="topic")
     */
    public function indexAction($topicid, Request $request)
    {
        $user = $this->getUser();
        $topics= $this->getDoctrine()->getRepository('AppBundle:ForumTopic')->findBy(['id'=>$topicid]);
        $topic=$topics[0];

        $error=null;
        $posts= $this->getDoctrine()->getRepository('AppBundle:ForumPost')->findBy(['topicid'=>$topic]);
        //dump($posts);
        //die;

        $post=new ForumPost();
        $post->setTopicid($topic);
        $post->setCreatedby($user);

        //$form=null;
        $form=$this->createForm(ForumPostType::class,$post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $re="/zzz/imu";
            if(preg_match($re,$post->getMsg())==0){
                // Save
                //dump($post);
                //die;
                $em = $this->getDoctrine()->getManager();
                $em->persist($post);
                $em->flush();

                return $this->redirectToRoute('topic',['topicid'=>$topicid]);
            }else{
$this->addFlash('messages','Post contains forbidden words and can`t be posted!');
            }


        }
        return $this->render('@App/postslist/postslist.html.twig',
            ['newpost_form'=>$form->createView(),
            'topic'=>$topic,
            'itemslist'=>$posts,
            'error'    => $error,
        ]);
    }
}