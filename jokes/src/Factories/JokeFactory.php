<?php
namespace Mehmedov\Jokes\Factories;

class JokeFactory
{
    private array $jokeAdapters;

    public function __construct(array $jokeAdapters)
    {
        $this->jokeAdapters = $jokeAdapters;
    }

    public function fetchJokes(): array
    {
        $jokes = [];

        foreach ($this->jokeAdapters as $adapter) {

            $currentAdapter = $adapter->getJokes();
            $jokes[] = $currentAdapter;
        }

        return $jokes; 
    }
}
