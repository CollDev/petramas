<?php
namespace Petramas\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;

class DatabaseUpdateCommand extends ContainerAwareCommand
{
    protected $route;
    
    public function __construct()
    {
        parent::__construct();
        $this->route = 'cd ' . __DIR__ . '/../../../../;';
    }
    
    protected function configure()
    {
        $this->setName('database:update')
             ->setDescription('Delete and reconstruct database.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write('<comment>Dropping database</comment> <question>>></question> ');
        $output->writeln(shell_exec($this->route . 'php app/console doctrine:database:drop --force'));
        
        $output->write('<comment>Creating database</comment> <question>>></question> ');
        $output->writeln(shell_exec($this->route . 'php app/console doctrine:database:create'));
        
        $output->write('<comment>Creating schema</comment> <question>>></question> ');
        $output->writeln(shell_exec($this->route . 'php app/console doctrine:schema:create'));
        
        $output->write('<comment>Loading fixtures</comment> <question>>></question> ');
        $output->writeln(shell_exec($this->route . 'php app/console doctrine:fixtures:load -n'));
        
        $output->writeln('<info>Finished successfully.</info>');
    }
}