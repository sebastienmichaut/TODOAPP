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
            $em = $this->getDoctrine()->getManager();
            $em->persist($toDoList);
            $em->flush();
            
            return $this->redirectToRoute("Welcome");
        }

        return $this->render('to_do_list/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/toDoList/update/{id}")
     */
    public function update(Request $request, ToDoList $updateList): Response{
        $form = $this->createForm(ToDoListType::class, $updateList);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute("Welcome");
        }

        return $this->render("to_do_list/index.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/toDoList/delete/{id}")
     */
    public function delete(ToDoList $delete): Response{
        $em = $this->getDoctrine()->getManager();
        $em->remove($delete);
        $em->flush();
        
        return $this->redirectToRoute("Welcome");
    }

    /**
     * @Route("/toDoList/read-all")
     */
    public function readAll(): Response {
        $repository = $this->getDoctrine()->getRepository(ToDoList::class);
        $lists = $repository->findAll();

        return $this->render("to_do_list/read-all.html.twig", [
            "listes" => $lists
        ]);
        // $totalTasks = $repository->createQueryBuilder('task')
        //         ->select('count(task.id)')
        //         ->getQuery()
        //         ->getSingleScalarResult();

        // $completedTasks = $repository->createQueryBuilder(‘task’)
        //         ->where(‘task’.completed = 1’)
        //     ->select('count(task.id)')
        //         ->getQuery()
        //         ->getSingleScalarResult();

    }

    /**
     * @Route("/toDoList/read/{id}")
     */
    public function read(ToDoList $list): Response {
        return $this->render("to_do_list/read.html.twig", [
            "liste" => $list
        ]);
    }

}