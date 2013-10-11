<?php
namespace Petramas\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductionUpdateCommand extends ContainerAwareCommand
{
    protected $route;
    
    public function __construct()
    {
        parent::__construct();
        $this->route = 'cd ' . __DIR__ . '/../../../../;php app/console ';
    }
    
    protected function configure()
    {
        $this->setName('prod:up')
             ->setDescription('Move to production.')
            ;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write('<comment>Pulling from git repository</comment> <question>>></question> ');
        $output->writeln(shell_exec('cd ' . __DIR__ . '/../../../../;git pull'));
        
        $output->write('<comment>Installing assets</comment> <question>>></question> ');
        $output->writeln(shell_exec($this->route . 'assets:install web --symlink'));
        
        $output->write('<comment>Updating schema</comment> <question>>></question> ');
        $output->writeln(shell_exec($this->route . 'doctrine:schema:update --force'));
        
        $output->write('<comment>Dumping assets</comment> <question>>></question> ');
        $output->writeln(shell_exec($this->route . 'assetic:dump web --env=prod'));
        
        $output->write('<comment>Clearing cache</comment> <question>>></question> ');
        $output->writeln(shell_exec($this->route . 'cache:clear --env=prod'));
        
        $output->writeln('<info>Finished successfully.</info>');
    }
}