<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Doctrine\Persistence\ObjectManager;

use function Symfony\Component\DependencyInjection\Loader\Configurator\param;

#[AsCommand(
    name: 'app:GenerateColors',
    description: 'This command adds colors for thhe products',
)]

class GenerateColorsCommand extends Command{

    private $colorpropertyFactory;

    /** @var ObjectManager */
    private $colorpropertyManager;
    
    public function __construct(ObjectManager $colorpropertyManager, FactoryInterface $colorpropertyFactory){
        $this -> colorpropertyManager = $colorpropertyManager;
        $this -> colorpropertyFactory = $colorpropertyFactory;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $red = $this -> colorpropertyFactory -> createNew();
        $red ->  setColor("Red");
        $red -> setId(1);
        $this -> colorpropertyManager -> persist($red);

        $green = $this -> colorpropertyFactory -> createNew();
        $green ->  setColor("Green");
        $green -> setId(2);
        $this -> colorpropertyManager -> persist($green);

        $blue = $this -> colorpropertyFactory -> createNew();
        $blue ->  setColor("Blue");
        $blue -> setId(3);
        $this -> colorpropertyManager -> persist($blue);
        
        if(!$this -> colorpropertyManager -> flush()){
            //return Command::FAILURE;
            return 1;
        }

        $io->success('Successfully added Red, Green and Blue!');

        //return Command::SUCCESS;
        return 0;
    }
}
