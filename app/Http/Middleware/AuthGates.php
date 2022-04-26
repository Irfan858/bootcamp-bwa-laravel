<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

//Use Management Roles Model
use App\Models\ManagementAccess\Role;

//Use Gate
use Illuminate\Support\Facades\Gate;



class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = \Auth::user();

        //Checking Validation Middleware
        //Cheking System On or Not
        //User Active or Not

        if(!app()->runningInConsole() && $user)
        {
            $roles           = Role::with('permission')->get();
            $permissonsArray = [];

            //Nested Loop
            //Looping For Role (where table role)
            foreach ($roles as $role)
            {
                //Looping For Permission (where table permission_role)
                foreach ($role->permission as $permissons)
                {
                    $permissonsArray[$permissons->title][] = $role->id;
                }
            }

            //Checking User Role
            foreach ($permissonsArray as $title => $roles)
            {
                Gate::define($title, function(\App\Models\User $user)
                use ($roles){
                    return count(array_intersect($user->role->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }

        // Return All Middleware
        return $next($request);
    }
}
