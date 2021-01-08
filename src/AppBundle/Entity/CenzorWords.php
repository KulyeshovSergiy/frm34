<?php


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class CenzorWords
{
    protected $words;

    public function __construct()
    {
        $this->words = new ArrayCollection();
    }

    public function getWords()
    {
        return $this->words;
    }

    public function removeWord(CenzorWord $word)
    {
        $this->words->removeElement($word);
    }
}