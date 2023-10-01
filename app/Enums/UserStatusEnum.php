<?php

namespace App\Enums;


enum UserStatusEnum:string
{
    case ACTIVE = "active";
    case ADMIN = "admin";
    case BLOCKED = "blocked";

    public static function user_status_all(): array
    {
        return[
            self::ACTIVE->value,
            self::ADMIN->value,
            self::BLOCKED->value,
        ];
    }
}