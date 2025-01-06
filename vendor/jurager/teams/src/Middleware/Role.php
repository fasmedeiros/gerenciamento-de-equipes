<?php

namespace Jurager\Teams\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role extends Teams
{
    /**
     * Handle incoming request.
     */
    public function handle(Request $request, Closure $next, string|array $roles, ?string $teamId = null, bool $options = false): mixed
    {
        if (! $this->authorization($request, 'roles', $roles, $teamId, [], $options)) {
            return $this->unauthorized();
        }

        return $next($request);
    }
}
