<?php

namespace App\Controller;

use App\Form\QuestionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    #[Route('/question/ask', name: 'app_question_form')]
    public function index(Request $request): Response
    {
        $formQuestion = $this->createForm(QuestionType::class);
        $formQuestion->handleRequest($request);
        if ($formQuestion->isSubmitted() && $formQuestion->isValid()) {
            dump($formQuestion->getData());
        }
        return $this->render('question/index.html.twig', [
            'form' => $formQuestion,
        ]);
    }
    #[Route('/question/{id}', 'question_show')]
    public function show(string $id): Response
    {
        // dd($id);
        $question = [
            "id" => 1,
            "title" => "Title",
            "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum asperiores quod quis nisi, ab beatae ipsum sint obcaecati ipsam, modi officia excepturi voluptas, corporis at tempore fugit exercitationem repudiandae ipsa?",
            "vote" => 4,
            "author" => [
                "name" => "Joe Doe",
                "img_url" => "https://i.pravatar.cc/300"
            ],
            "nbr_answers" => 4
        ];
        return $this->render('question/show.html.twig', [
            "question" => $question
        ]);
    }
}
