<?php

declare(strict_types=1);

namespace Domains\Content\Enums;

use PHPOnline\Attributes\Description;
use PHPOnline\Concerns\CanAccessAttributes;

enum Category: string
{
    use CanAccessAttributes;

    #[Description('Articles that focus on teaching you something.')]
    case TUTORIAL = 'TUTORIAL';

    #[Description('Articles that focus on walking you through something more simple.')]
    case HOW_TO = 'HOW TO';
}
