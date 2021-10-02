<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Person;

class CheckLoginData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Person::where('mail', $request->mail)->where('pass', $request->pass)->exists() == false) {
            return redirect('login')->with(['re_signal' => 'error', 're_message' => 'メールアドレスが登録されていないかパスワードが違います']);
        }
        
        return $next($request);
    }
}
