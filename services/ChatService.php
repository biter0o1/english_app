<?php
class ChatService {
    private string $apiKey;

    public function generateExample(string $word): string {
        $prompt = "Napisz jedno proste zdanie po angielsku używając słowa: '$word'";

        // $response = $this->callOpenAI($prompt);
        $response = 'asdasd';
        return $response;
    }

    public function __construct() {
        $this->apiKey = getenv('OPENAI_API_KEY');
    }

    private function callOpenAI(string $prompt): string {
        $data = [
            "model" => "gpt-3.5-turbo",
            "messages" => [
                ["role" => "user", "content" => $prompt]
            ],
            "max_tokens" => 50,
            "temperature" => 0.7
        ];

        $ch = curl_init("https://api.openai.com/v1/chat/completions");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer {$this->apiKey}"
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $result = curl_exec($ch);
        if ($result === false) {
            throw new Exception("Error: " . curl_error($ch));
        }

        curl_close($ch);

        $json = json_decode($result, true);
        return $json['choices'][0]['message']['content'] ?? '';
    }
}