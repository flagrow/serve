<?php

namespace Flagrow\Serve\Commands;

use Flarum\Console\Command\AbstractCommand;
use Illuminate\Console\Command;
use Symfony\Component\Process\ProcessUtils;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\PhpExecutableFinder;

/**
 * Start Flarum in the PHP developement server
 * Based on Illuminate\Foundation\Console\ServeCommand
 */
class ServeCommand extends AbstractCommand
{
    protected $basePath;
    protected $serverPath;

    /**
     * @param string $basePath
     */
    public function __construct($basePath, $serverPath)
    {
        $this->basePath = $basePath;
        $this->serverPath = $serverPath;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('serve')
            ->setDescription("Serve the application on the PHP development server")
            ->addOption('host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on.', '127.0.0.1')
            ->addOption('port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on.', 8000);
    }

    /**
     * Execute the console command.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function fire()
    {
        chdir($this->basePath);

        $this->info("<info>Flarum development server started:</info> <http://{$this->host()}:{$this->port()}>");

        passthru($this->serverCommand());
    }

    /**
     * Get the full server command.
     *
     * @return string
     */
    protected function serverCommand()
    {
        return sprintf('%s -S %s:%s %s',
            ProcessUtils::escapeArgument((new PhpExecutableFinder)->find(false)),
            $this->host(),
            $this->port(),
            ProcessUtils::escapeArgument($this->serverPath)
        );
    }

    /**
     * Get the host for the command.
     *
     * @return string
     */
    protected function host()
    {
        return $this->input->getOption('host');
    }

    /**
     * Get the port for the command.
     *
     * @return string
     */
    protected function port()
    {
        return $this->input->getOption('port');
    }
}
