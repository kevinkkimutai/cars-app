<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
  /**
     * Determine if the session and input CSRF tokens match.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */

     protected $except = [
        '/cars',
        '/cars/create',
        '/carmodel',
        '/carmodel/list',
        '/carmodel/create',
    ];

    protected function tokensMatch($request)
    {

        // Exclude the delete route from CSRF token check
        if ($request->isMethod('delete') || $request->isMethod('put') || $request->isMethod('patch')) {
            return true;
        }

        return parent::tokensMatch($request);
    }

}
