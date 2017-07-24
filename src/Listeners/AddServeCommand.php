<?php

namespace Flagrow\Serve\Listeners;

use Flagrow\Console\Events\ConfigureConsoleApplication;
use Flagrow\Serve\Commands\ServeCommand;
use Illuminate\Contracts\Events\Dispatcher;

class AddServeCommand
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureConsoleApplication::class, [$this, 'addCommand']);
    }

    public function addCommand(ConfigureConsoleApplication $event)
    {
        if ($event->app->isInstalled()) {

            $event->console->add(new ServeCommand($event->app->basePath(), __DIR__ . '/../server.php'));
        }
    }
}
