<?php

class ChatService {
    private string $apiKey;
    private \OpenAI\Client $client;

    public function generateExample(string $word): string {
        $prompt = "Napisz jedno proste zdanie po angielsku używając słowa: '$word'";

        $response = $this->callOpenAI($prompt);
        return $response;
    }

    public function __construct() {
        $this->apiKey = $_ENV['OPENAI_API_KEY'];
        $this->client = OpenAI::client($this->apiKey);
    }

    private function callOpenAI(string $prompt): string {
        $response = $this->client->chat()->create([
            'model' => 'gpt-5-nano',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant that writes simple English sentences.'],
                ['role' => 'user', 'content' => $prompt]
            ],
        ]);

        return $response->choices[0]->message->content ?? '';
    }

}