<?php

declare(strict_types=1);

namespace Lilith\Console;

use Lilith\DependencyInjection\ContainerInterface;

class Kernel implements KernelInterface
{
    public function __construct(protected ContainerInterface $container) {}

    public function handle(ArgvInput $argvInput): void
    {
        try {
            $router = $this->container->get('console.router');
            $router->execute($argvInput);
        } catch (\Throwable $e) {
            throw new $e;
        }
    }
}
