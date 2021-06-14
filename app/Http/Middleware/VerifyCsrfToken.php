<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'instituicao/*',
        'curso/*',
        'usuario/*',
        'pessoa/*',
        'aluno/*',
        'desconto/*',
        'fatura/*',
        'dividas/*',
        'status/*',
        'pagamentos/*',
    ];
}
