<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Task{

    // Attributes

    private $id;

/**
 * @Assert\NotBlank(message = "Le nom ne doit pas être vide.")
 * @Assert\Length(
 *      min = 1,
 *      max = 25,
 *      minMessage = "Le nom est trop court",
 *      maxMessage = "Le nom est trop long"
 * )
 */
    private $title;
    private $id_list;
    private $completed;

    // Methods

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getId_list()
    {
        return $this->id_list;
    }

    public function getCompleted()
    {
        return $this->completed;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setId_list($id_list)
    {
        $this->id_list = $id_list;
        return $this;
    }

    public function setCompleted($completed)
    {
        $this->completed = $completed;
        return $this;
    }
}

