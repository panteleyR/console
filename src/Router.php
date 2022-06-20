<?php

declare(strict_types=1);

namespace Lilith\Console;

use Lilith\DependencyInjection\ContainerInterface;

class Router implements RouterInterface
{
    protected array $routes = [];

    public function execute(ContainerInterface $container, ArgvInput $argvInput): void
    {
        $routeClass = $this->findRoute($argvInput->getCommandName());
        $container->get($routeClass)->execute($argvInput);
    }

    public function findRoute(string $commandName): string
    {
        foreach ($this->routes as $routeName => $routeClass) {
            if ($routeName === $commandName) {
                return $routeClass;
            }
        }

        throw new \Exception('Route not found');
    }

    public function setRoutes(array $routes): void
    {
        $this->routes = $routes;
    }
}
