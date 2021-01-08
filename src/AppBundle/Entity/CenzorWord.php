<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CenzorWord
 *
 * @ORM\Table(name="cenzor_word")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CenzorWordRepository")
 */
class CenzorWord
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
     * @ORM\Column(name="cword", type="string", length=255)
     */
    private $cword;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id=$id;
        return $this;
    }

    /**
     * Set cword
     *
     * @param string $cword
     *
     * @return CenzorWord
     */
    public function setCword($cword)
    {
        $this->cword = $cword;

        return $this;
    }

    /**
     * Get cword
     *
     * @return string
     */
    public function getCword()
    {
        return $this->cword;
    }
}

