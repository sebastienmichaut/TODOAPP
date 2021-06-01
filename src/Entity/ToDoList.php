<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="to_do_list")
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
 * @ORM\Column(type="integer")
 */
    private $task;

    // Methods

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getColor(){
        return $this->color;
    }

    public function getTask(){
        return $this->task;
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

    public function setTask($task){
        $this->task = $task;
        return $this;
    }
}
