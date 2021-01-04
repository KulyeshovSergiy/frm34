<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumPost
 *
 * @ORM\Table(name="forum_post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ForumPostRepository")
 */
class ForumPost
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
     * @ORM\Column(name="msg", type="text")
     */
    private $msg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdat", type="datetime")
     */
    private $createdat;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $createdby;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ForumTopic")
     */
    private $topicid;

    public function __construct()
    {
        $this->createdat=new \DateTime();
    }

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
     * Set msg
     *
     * @param string $msg
     *
     * @return ForumPost
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;

        return $this;
    }

    /**
     * Get msg
     *
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return ForumPost
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set createdby
     *
     * @param integer $createdby
     *
     * @return ForumPost
     */
    public function setCreatedby($createdby)
    {
        $this->createdby = $createdby;

        return $this;
    }

    /**
     * Get createdby
     *
     * @return int
     */
    public function getCreatedby()
    {
        return $this->createdby;
    }

    /**
     * Set topicid
     *
     * @param integer $topicid
     *
     * @return ForumPost
     */
    public function setTopicid($topicid)
    {
        $this->topicid = $topicid;

        return $this;
    }

    /**
     * Get topicid
     *
     * @return int
     */
    public function getTopicid()
    {
        return $this->topicid;
    }
}

