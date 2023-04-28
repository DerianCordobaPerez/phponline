<?php

declare(strict_types=1);

namespace Domains\Content\Enums;

use PHPOnline\Attributes\Description;
use PHPOnline\Concerns\CanAccessAttributes;

enum Level: string
{
    use CanAccessAttributes;

    #[Description('This content is aimed at people new to PHP.')]
    case ENTRY = 'ENTRY';

    #[Description('This content is aimed at junior and newer developers.')]
    case JUNIOR = 'JUNIOR';

    #[Description('This content is aimed at developers who have a couple of years of experience.')]
    case MID = 'MID';

    #[Description('This content is aimed at developers who have a grasp on more advanced topics.')]
    case INTERMEDIATE = 'INTERMEDIATE';

    #[Description('This content is aimed at developers who are familiar with more advanced topics and ideas.')]
    case SENIOR = 'SENIOR';

    #[Description('This content is aimed at the most experienced of developers.')]
    case ADVANCED = 'ADVANCED';
}
