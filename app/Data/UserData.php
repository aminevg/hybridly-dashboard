<?php

namespace App\Data;

use Spatie\LaravelData\Data;

final class UserData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $email,
    ) {
    }
}
