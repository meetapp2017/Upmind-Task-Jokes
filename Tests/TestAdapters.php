<?php

namespace Mehmedov\Tests;

//хм нешо не работи коректно 
//require 'vendor/autoload.php';

use Mehmedov\Jokes\Adapters\JokeProgramming;
use Mehmedov\Jokes\Adapters\JokeScience;
use Mehmedov\Jokes\Factories\JokeFactory;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '../../jokes/src/Interfaces\JokeInterface.php';
require_once __DIR__ . '../../jokes/src/Providers\JokeProvider.php';
require_once __DIR__ . '../../jokes/src/Logger\JokeLogger.php';
require_once __DIR__ . '../../jokes/src/Adapters/JokeScience.php';
require_once __DIR__ . '../../jokes/src/Adapters/JokeProgramming.php';
require_once __DIR__ . '../../jokes/src/Factories/JokeFactory.php';

class TestAdapters extends TestCase
{
    public function testJokes()
    {
        $apiKey = "27d19a6107mshd8a00685fa9896ap1b1ac6jsn6d323ffc2300";

        // 1. Science adapter configuration
        $urlScience = "https://jokes-always.p.rapidapi.com/common";
        $hostScience = "jokes-always.p.rapidapi.com";

        $jokeScience = new JokeScience($apiKey, $urlScience, $hostScience);
        $jokes = $jokeScience->getJokes();
        $this->assertIsArray($jokes);
        $this->assertJson(json_encode($jokes));

        print_r($jokes);

        // 2. Programming adapter configuration
        $urlProgramming = "https://jokeapi-v2.p.rapidapi.com/joke/Any?format=json";
        $hostProgramming = "jokeapi-v2.p.rapidapi.com";

        $jokeProgramming = new JokeProgramming($apiKey, $urlProgramming, $hostProgramming);
        $jokes = $jokeProgramming->getJokes();
        $this->assertIsArray($jokes);
        $this->assertJson(json_encode($jokes));
        print_r($jokes);

        //3. New instance for JokeFactory and fecth all results from adapters
        $jokeFactory = new JokeFactory([$jokeScience, $jokeProgramming]);
        $jokes = $jokeFactory->fetchJokes();
        $this->assertIsArray($jokes);
        $this->assertJson(json_encode($jokes));
        print_r($jokes);
    }
}
