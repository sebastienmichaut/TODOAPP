<?php

namespace App\Controller;

use App\Entity\ToDoList;
use App\Form\ToDoListType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/toDoList", name="to_do_list")
     */
    public function new(Request $request): Response{
        $toDoList = new ToDoList();
        
        $form = $this->createForm(ToDoListType::class, $toDoList);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dump($toDoList);
        }

        return $this->render('to_do_list/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}