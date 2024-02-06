<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $questions = [
            [
                "id" => 1,
                "title" => "Title",
                "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum asperiores quod quis nisi, ab beatae ipsum sint obcaecati ipsam, modi officia excepturi voluptas, corporis at tempore fugit exercitationem repudiandae ipsa?",
                "vote" => 4,
                "author" => [
                    "name" => "Joe Doe",
                    "img_url" => "https://i.pravatar.cc/300"
                ],
                "nbr_answers" => 4
            ],
            [
                "id" => 2,
                "title" => "Title",
                "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum asperiores quod quis nisi, ab beatae ipsum sint obcaecati ipsam, modi officia excepturi voluptas, corporis at tempore fugit exercitationem repudiandae ipsa?",
                "vote" => 0,
                "author" => [
                    "name" => "Joe Doe",
                    "img_url" => "https://i.pravatar.cc/300"
                ],
                "nbr_answers" => 4
            ],
            [
                "id" => 3,
                "title" => "Title",
                "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum asperiores quod quis nisi, ab beatae ipsum sint obcaecati ipsam, modi officia excepturi voluptas, corporis at tempore fugit exercitationem repudiandae ipsa?",
                "vote" => -12,
                "author" => [
                    "name" => "Joe Doe",
                    "img_url" => "https://i.pravatar.cc/300"
                ],
                "nbr_answers" => 4
            ]
        ];
        return $this->render('home/index.html.twig', [
            'questions' => $questions,
        ]);
    }
}
