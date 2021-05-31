<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController{

    /**
     * @Route("/createTask", name="task")
     */
    public function newTask(Request $request): Response{
        $task = new Task();

        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dump($task);
        }

        return $this->render('task/createTask.html.twig', [
            'form' => $form->createView()
        ]);
    }
}