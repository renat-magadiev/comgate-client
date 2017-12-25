<?php
declare(strict_types=1);

namespace Comgate\Enum;

class PaymentStatus
{
    const PENDING = 'PENDING';
    const PAID = 'PAID';
    const CANCELLED = 'CANCELLED';
    const AUTHORIZED = 'AUTHORIZED';
}