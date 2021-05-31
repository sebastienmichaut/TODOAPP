<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class ToDoList {

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
    private $name;

/**
 * @Assert\NotBlank(message = "La couleur ne doit pas être vide.")
 */
    private $color;

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
}
