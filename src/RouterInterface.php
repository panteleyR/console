<?php

declare(strict_types=1);

namespace Lilith\Console;

use Lilith\DependencyInjection\ContainerInterface;

interface RouterInterface
{
    public function execute(ContainerInterface $container, ArgvInput $argvInput): void;
    public function findRoute(string $commandName): string;
    public function setRoutes(array $routes): void;
}
