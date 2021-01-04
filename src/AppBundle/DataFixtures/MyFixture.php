<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Forum;
use AppBundle\Entity\ForumTopic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use AppBundle\Entity\User;

class MyFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    // ...
    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('skulyeshov@loginet.hu');

        $password = $this->encoder->encodePassword($user, 'admin');
        $user->setPassword($password);
        $roles=['ROLE_USER','ROLE_ADMIN','ROLE_SUPER_ADMIN'];
        $user->setRoles($roles);

        $manager->persist($user);
        $manager->flush();

        $forum = new Forum();
        $forum->setTitle('PHP');
        $manager->persist($forum);
        $manager->flush();
        $forum = new Forum();
        $forum->setTitle('MySQL');
        $manager->persist($forum);
        $manager->flush();
        $forum = new Forum();
        $forum->setTitle('HTML');
        $manager->persist($forum);
        $manager->flush();
        $forum = new Forum();
        $forum->setTitle('CSS');
        $manager->persist($forum);
        $manager->flush();
        /*$repository=$manager->getRepository('AppBundle:Forum');
        $forum= $repository->findBy(['id'=>2]);
        $users=$manager->getRepository('AppBundle:User');
        $user= $users->findBy(['id'=>2]);

        $ztopic=new ForumTopic();
        $ztopic->setTitle('Topic qwerty 123');
        $ztopic->setForumid($forum[0]);
        $ztopic->setCreatedby($user[0]);
        $ztopic->setPostscount(0);
        $manager->persist($ztopic);
        $manager->flush();*/


    }
}