<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use Doctrine\ORM\EntityManagerInterface;
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
    public function show(string $id, EntityManagerInterface $entityManager): Response
    {
        // dd($id);
        $question = $entityManager->getRepository(Question::class)->find($id);
        return $this->render('question/show.html.twig', [
            "question" => $question
        ]);
    }
}
