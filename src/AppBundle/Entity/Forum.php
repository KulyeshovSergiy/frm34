<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Forum
 *
 * @ORM\Table(name="forum")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ForumRepository")
 */
class Forum
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
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="topicscount", type="integer", options={"default":0})
     */
    private $topicscount=0;

    /**
     * @var int
     *
     * @ORM\Column(name="postscount", type="integer", options={"default":0}))
     */
    private $postscount=0;


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
     * @return Forum
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
     * Set topicscount
     *
     * @param integer $topicscount
     *
     * @return Forum
     */
    public function setTopicscount($topicscount)
    {
        $this->topicscount = $topicscount;

    }

    /**
     * Get topicscount
     *
     * @return int
     */
    public function getTopicscount()
    {
        return $this->topicscount;
    }

    /**
     * Set postscount
     *
     * @param integer $postscount
     *
     * @return Forum
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

