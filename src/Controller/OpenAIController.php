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

        $json = $openAi->getCommitExplaination("preserve dateTime sort", "-const commitSHAs = result.data.map(commit => commit.sha);
        +const commitSHAs = result.data.map(commit => commit.sha).reverse();
         
         
         
        @@ -38,12 +38,14 @@ async function getCommitChanges(commitSHAs) {
               repo: repo,
               commit_sha: commitSHA
             });
        -
        +    document.body.innerHTML += ");
       

        return $this->render('open_ai/index.html.twig', [
            'controller_name' => 'OpenAIController',
            'json' => $json,
        ]);
    }
}
