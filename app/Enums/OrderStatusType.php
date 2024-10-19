<?php
namespace App\Enums;

enum OrderStatusType : int
{
    case Pending = 1;

    case Confirmed = 2;

    case Received_By_Rider = 3;

    case On_the_Way_to_Deliver = 4;

    case Delivered = 5;
}