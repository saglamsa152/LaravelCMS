<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		try {
			return parent::handle($request, $next);
		} catch(TokenMismatchException $e){
			if ($request->ajax())
			{
				//return response('Unauthorized.', 401);
				$ajaxResponse = array('status' => 'danger', 'msg' => 'Authenticate time out, Please login again');
				return response()->json($ajaxResponse);
			}
		}
	}

}
