<?php
class Api {
    private $omdbKey;
    private $geminiKey;

    public function __construct() {
        $this->omdbKey   = $_ENV['OMDB'] ?? null;
        $this->geminiKey = $_ENV['GEMINI'] ?? null;
    }

    public function searchMovie($title) {
        $encodedTitle = urlencode($title);
        $url = "http://www.omdbapi.com/?apikey={$this->omdbKey}&t={$encodedTitle}";

        $response = file_get_contents($url); // ✅ actually fetch data
        return json_decode($response, true);
    }


    public function generateReviews($title) {
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$this->geminiKey}";

        $prompt = "Write a 15 line AI review out of 5 for the movie titled '{$title}'.";

        $payload = [
            "contents" => [
                [
                    "role" => "user",
                    "parts" => [
                        ["text" => $prompt]
                    ]
                ]
            ]
        ];

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
            CURLOPT_POSTFIELDS     => json_encode($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            return "CURL Error: {$error}";
        }

        curl_close($ch);

        $result = json_decode($response, true);
        return $result['candidates'][0]['content']['parts'][0]['text'] ?? 'We are still working on AI review. Check back soon!';
    }
}
