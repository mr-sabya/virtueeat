<?php
namespace App\Enums;

enum UserType : int
{
    case USER = 0;

    case MERCHANT = 1;

    case RIDER = 2;
}