<?php

namespace AppBundle\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Lock\Factory;


class ImportProductCommand extends Command
{
    /**
     * @var string $fileName
     */
    private $fileName;

    private $rootDir;

    private $factory;




    /** @var SymfonyStyle $io */
    private $io;

    /** @var LoggerInterface $logger */
    private $logger;

    public function __construct( LoggerInterface $logger , $rootDir, Factory $factory)
    {
        parent::__construct();
        $this->logger = $logger;
        $this->rootDir = $rootDir;
        $this->factory = $factory;
    }

    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this->setName('app:import:product');
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $finder = new Finder();

        try {
            $finder->name('*.txt')->in($this->rootDir.'/../')->files();
            $finder->depth(0);


                foreach ($finder as $file) {
                    $lock = $this->factory->createLock((string)$file, 300.0, false);
                    if ($lock->acquire(false)) {
                        echo  (string)$file.PHP_EOL;
                    }

                }

        } catch (\Exception $exception) {
            $this->logger->error($exception->getMessage());
            $this->io->error($exception->getMessage());
        }
    }
}
