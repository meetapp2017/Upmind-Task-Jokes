<?php

namespace Mehmedov\Jokes\Providers;

use Psr\Log\LoggerInterface;
use GuzzleHttp\Client;
use Mehmedov\Jokes\Exceptions\JokeException;
use Mehmedov\Jokes\Logger\JokeLogger;

class JokeProvider
{
    private string $apiKey;
    private string $apiUrl;
    private string $host;
    private string $body;
    private LoggerInterface $logger;
    protected Client $client;

    public function __construct(string $apiKey, $apiUrl, $host, $body = "")
    {
        $this->logger = JokeLogger::create('ProviderLog');

        $this->apiUrl = $apiUrl;
        $this->host = $host;
        $this->body = $body;
        $this->apiKey = $apiKey;
        $this->client = new Client();
    }

    public function fetchJokes(): array 
    {
        $response = [];

        try {
            $apiResponse = $this->client->request('GET', $this->apiUrl, [
                'body' => $this->body,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'x-rapidapi-host' => $this->host,
                    'x-rapidapi-key' => $this->apiKey, 
                ],
            ]);

            $response = json_decode($apiResponse->getBody(), true);
 
            $this->logger->info('Received jokes from API', ['jokes' => $response]);

        } catch (JokeException $e) {
            $this->logger->error('API request failed', ['message' => $e->getMessage()]);
        }

        return $response; 
    }
}
