<?php

declare(strict_types=1);

namespace Lilith\Console;

use Lilith\DependencyInjection\ContainerInterface;

class Router implements RouterInterface
{
    protected array $routes = [];

    public function __construct(protected ContainerInterface $container) {}

    public function execute(ArgvInput $argvInput): void
    {
        $routeClass = $this->findRoute($argvInput->getCommandName());
        $this->container->get($routeClass)->execute($argvInput);
    }

    public function findRoute(string $commandName): string
    {
        foreach ($this->routes as $routeName => $routeClass) {
            if ($routeName === $commandName) {
                return $routeClass;
            }
        }

        throw new \RuntimeException('Route not found');
    }

    public function setRoutes(array $routes): void
    {
        $this->routes = $routes;
    }
}
