<?php

declare(strict_types=1);

namespace Lilith\Console;

interface RouterInterface
{
    public function execute(ArgvInput $argvInput): void;
    public function findRoute(string $commandName): string;
    public function setRoutes(array $routes): void;
}
