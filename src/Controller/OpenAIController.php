<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\OpenAiService;

class OpenAIController extends AbstractController
{
    #[Route('/openai', name: 'app_open_a_i')]
    public function index(Request $request, OpenAiService $openAi,): Response
    {

        $prompt = " Colored middle ages engravinga of cute young cat drinking milk";
        $image = $openAi->getImageGenerated($prompt);


        return $this->render('open_ai/index.html.twig', [
            'controller_name' => 'OpenAIController',
            'image' => $image,
            'prompt' => $prompt
        ]);
    }
}
