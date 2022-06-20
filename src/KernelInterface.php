<?php

declare(strict_types=1);

namespace Lilith\Console;

interface KernelInterface
{
    public function handle(ArgvInput $argvInput): void;
}
