<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="List")
 */
class ToDoList {

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
     *      max = 25,
     *      minMessage = "Le nom est trop court",
     *      maxMessage = "Le nom est trop long"
     * )
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @Assert\NotBlank(message = "La couleur ne doit pas être vide.")
     * @ORM\Column(type="string")
     */
    private $color;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Task", mappedBy="list")
     */
    private $tasks;

    // Methods

    public function __construct() {
        $this->tasks = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getColor(){
        return $this->color;
    }

    public function getTasks(){
        return $this->tasks;
    }

    public function setId(int $id) {
        $this->id = $id;
        return $this;
    }

    public function setName(string $name) {
        $this->name = $name;
        return $this;
    }

    public function setColor(string $color) {
        $this->color = $color;
        return $this;
    }

    public function setTasks($tasks){
        $this->tasks = $tasks;
        return $this;
    }
}
