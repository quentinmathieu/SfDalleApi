<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Orhanerday\OpenAi\OpenAi;

class OpenAiService
{
    public function __construct(private ParameterBagInterface $param)
    {
        
    }

    public function getImageGenerated(string $prompt) : string
    {
        $open_ai_key = $this->param->get('OPENAI_API_KEY');

        $open_ai = new OpenAi($open_ai_key);

        
        $complete =  $open_ai->image([
            "prompt" => $prompt,
            "n" => 1,
            "size" => "512x512",
            "response_format" => "url",
         ]);
         $json = json_decode($complete, true);
    
        
        return $json['data'][0]['url'];
    }
}