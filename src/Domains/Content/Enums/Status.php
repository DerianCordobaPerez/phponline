<?php

declare(strict_types=1);

namespace Domains\Content\Enums;

enum Status: string
{
    case DRAFT = 'DRAFT';
    case PUBLISHED = 'PUBLISHED';
    case DENIED = 'DENIED';
}
