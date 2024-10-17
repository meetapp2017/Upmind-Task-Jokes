<?php
namespace Mehmedov\Jokes\Logger;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Psr\Log\LoggerInterface;

class JokeLogger
{
    public static function create(string $name): LoggerInterface
    {
        $logger = new Logger($name);
        $logger->pushHandler(new StreamHandler(__DIR__ . '/logs/' . $name . '.log', Level::Info));

        return $logger;
    }
}
