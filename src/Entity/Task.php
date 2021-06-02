<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TaskRepository;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task{

    // Attributes

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message = "Le nom ne doit pas être vide.")
     * @Assert\Length(
     *      min = 1,
     *      max = 50,
     *      minMessage = "Le nom est trop court",
     *      maxMessage = "Le nom est trop long"
     * )
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ToDoList", inversedBy="tasks")
     * @ORM\JoinColumn(name="list_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $list;

    /**
     * @ORM\Column(type="boolean")
     */
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

    public function getList()
    {
        return $this->list;
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

    public function setList($list)
    {
        $this->list = $list;
        return $this;
    }

    public function setCompleted($completed)
    {
        $this->completed = $completed;
        return $this;
    }
}

