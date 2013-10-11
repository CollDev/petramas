<?php
namespace Petramas\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DevelopmentUpdateCommand extends ContainerAwareCommand
{
    protected $route;
    
    public function __construct()
    {
        parent::__construct();
        $this->route = 'cd ' . __DIR__ . '/../../../../;php app/console ';
    }
    
    protected function configure() {
        $this->setName('dev:up')
             ->setDescription('Development update.')
        ;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->write('<comment>Pulling from git repository</comment> <question>>></question> ');
        $output->writeln(shell_exec('cd ' . __DIR__ . '/../../../../;git pull'));
        
        $output->write('<comment>Installing assets</comment> <question>>></question> ');
        $output->writeln(shell_exec($this->route . 'assets:install web --symlink'));
        
        $output->write('<comment>Updating schema</comment> <question>>></question> ');
        $output->writeln(shell_exec($this->route . 'doctrine:schema:update --force'));
        
        $output->write('<comment>Clearing cache</comment> <question>>></question> ');
        $output->writeln(shell_exec($this->route . 'cache:clear'));
        
        $output->writeln('<info>Finished successfully.</info>');
    }
}