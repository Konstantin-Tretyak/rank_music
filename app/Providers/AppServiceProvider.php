<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (\App::environment('local')) {
            \Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
                $msg =  "== SQL: ".$query->sql."\n";
                $msg .= "== Params: ".join(', ', $query->bindings);

                // if code is executed in CLI, echo message
                if (\App::runningInConsole()) {
                    echo $msg."\n\n";
                }
                // if code executed by server, log message
                else {
                    // \Log::debug($msg);
                    error_log($msg); // log into php builtin server
                }

            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
