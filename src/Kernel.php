<?php

declare(strict_types=1);

namespace Lilith\Console;

use Throwable;

class Kernel implements KernelInterface
{
    public function __construct(protected readonly RouterInterface $router) {}

    /**
     * @throws Throwable
     */
    public function handle(ArgvInput $argvInput): void
    {
        try {
            $this->router->execute($argvInput);
        } catch (Throwable $e) {
            throw $e;
        }
    }
}
