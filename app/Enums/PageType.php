<?php
namespace App\Enums;

enum PageType : string
{
    case HOMEPAGE = 'homepage';

    case ABOUTPAGE = 'aboutpage';

    case PRIVACYPAGE = 'privacy';

    case TERMSPAGE = 'terms';

    case VEHICLE = 'vehicle';
}