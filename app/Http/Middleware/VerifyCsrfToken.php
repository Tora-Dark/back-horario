<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    // app/Http/Middleware/VerifyCsrfToken.php
protected $except = [
    'https://back-horario-production.up.railway.app', // Cambia esto por la URL correcta de tu API
];
}
