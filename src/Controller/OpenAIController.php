<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\OpenAiService;

class OpenAIController extends AbstractController
{
    #[Route('/imgGen', name: 'img_gen')]
    public function index( OpenAiService $openAi,): Response
    {
        $prompt = "Colored photo of a cute young dog (golden retriever) swimmng in the sea, a stick in the , we can see the beach (wich noone on it), and some big rocks on the right side of the photo. There is an halo effect on the photo.";


          
        $image = $openAi->getImageGenerated($prompt);


        return $this->render('open_ai/index.html.twig', [
            'controller_name' => 'OpenAIController',
            'image' => $image,
            'prompt' => $prompt
        ]);
    }

    #[Route('/imgVar', name: 'img_var')]
    public function imgVar( OpenAiService $openAi,): Response
    {
        $prompt = null;

        $img = curl_file_create('img/testImgg.png');

        $image = $openAi->getImageVariation($img);  
        // $image = $openAi->getImageGenerated($prompt);


        return $this->render('open_ai/index.html.twig', [
            'controller_name' => 'OpenAIController',
            'image' => $image,
            'prompt' => $prompt
        ]);
    }
}
