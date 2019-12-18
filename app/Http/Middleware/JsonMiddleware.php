<?php

  namespace App\Http\Middleware;

  use Closure;

  /**
   * Intercepts all incoming requests and ensures
   * they're set to request a json response.
   */
  class JsonMiddleware
  {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $accept_value = $request->headers->get('Accept');
      if (strtolower($accept_value) !== 'application/json') {
        $request->headers->set('Accept', 'application/json');
      }
      $response = $next($request);
      return $response;
    }
  }
