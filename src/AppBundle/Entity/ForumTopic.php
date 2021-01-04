<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumTopic
 *
 * @ORM\Table(name="topic")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TopicRepository")
 */
class ForumTopic
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Forum")
     */
    private $forumid;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $createdby;


    /**
     * @var int
     *
     * @ORM\Column(name="postscount", type="integer")
     */
    private $postscount;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return ForumTopic
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set Forumid
     *
     * @param int $forumid
     *
     * @return ForumTopic
     */
    public function setForumid($forumid)
    {
        $this->forumid = $forumid;

    }

    /**
     * Get Forumid
     *
     * @return int
     */
    public function getForumid()
    {
        return $this->forumid;
    }
    /**
     * Set Createdby
     *
     * @param int $createdby
     *
     */
    public function setCreatedby($createdby)
    {
        $this->createdby = $createdby;

    }

    /**
     * Get Createdby
     *
     * @return int
     */
    public function getCreatedby()
    {
        return $this->createdby;
    }

    /**
     * Set postscount
     *
     * @param integer $postscount
     *
     * @return ForumTopic
     */
    public function setPostscount($postscount)
    {
        $this->postscount = $postscount;

    }

    /**
     * Get postscount
     *
     * @return int
     */
    public function getPostscount()
    {
        return $this->postscount;
    }
}

