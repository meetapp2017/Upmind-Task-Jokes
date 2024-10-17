<?php

namespace Mehmedov\Jokes\Adapters;

use Mehmedov\Jokes\Providers\JokeProvider;
use Mehmedov\Jokes\Interfaces\JokeInterface;

class JokeScience implements JokeInterface
{
    private string $apiUrl;
    private string $host;
    private string $body;

    public function __construct(string $apiUrl, $host, $body = "")
    {

        $this->apiUrl = $apiUrl;
        $this->host = $host;
        $this->body = $body;
    }


    public function getJokes(): array
    {
        $jokeProvider = new JokeProvider($this->apiUrl, $this->host, $this->body);
        return $jokeProvider->fetchJokes();
    }
}
