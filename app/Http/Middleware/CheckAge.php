<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckAge
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('birthdate')) {
            $birthdate = Carbon::parse($request->birthdate);
            $age = $birthdate->age;

            if ($age < 22) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['birthdate' => 'Anda harus berusia minimal 22 tahun untuk mendaftar.']);
            }
        }

        return $next($request);
    }
}