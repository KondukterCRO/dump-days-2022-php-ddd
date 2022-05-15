<?php

declare(strict_types=1);

namespace App\Domain\Common\Exception;

final class UserNotAuthenticatedException extends TranslatableException
{
    public function __construct()
    {
        parent::__construct('errors.security.user_not_found', []);
    }
}
