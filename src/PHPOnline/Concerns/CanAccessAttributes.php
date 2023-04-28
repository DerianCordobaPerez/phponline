<?php

declare(strict_types=1);

namespace PHPOnline\Concerns;

use BackedEnum;
use Illuminate\Support\Str;
use PHPOnline\Attributes\Description;
use ReflectionClassConstant;

/**
 * @mixin BackedEnum
 */
trait CanAccessAttributes
{
    public function description(): string
    {
        $reflection = new ReflectionClassConstant(
            class: $this::class,
            constant: $this->name,
        );
        $classAttributes = $reflection->getAttributes(
            name: Description::class,
        );

        if (count($classAttributes) === 0) {
            return Str::headline($this->value);
        }

        return $classAttributes[0]->newInstance()->description;
    }
}
