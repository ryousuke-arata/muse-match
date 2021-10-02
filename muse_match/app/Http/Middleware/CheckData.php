<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Person;

class CheckData
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
        $messages = [
            'id' => '違うIDを設定してください',
            'mail' => '既に登録されているメールアドレスです',
        ];

        if (Person::where('id', $request->id)->where('mail', $request->mail)->exists() == true) {
            return redirect('new')->with(['re_signal' => 'all', 'id_message' => $messages['id'], 'mail_message' => $messages['mail']]);
        }
        elseif (Person::where('id', $request->id)->exists() == true) {
            return redirect('new')->with(['re_signal' => 'id', 'id_message' => $messages['id']]);
        }
        elseif (Person::where('mail', $request->mail)->exists() == true) {
            return redirect('new')->with(['re_signal' => 'mail', 'mail_message' => $messages['mail']]);
        }

        return $next($request)->with('re_signal', 'none');
    }
}
