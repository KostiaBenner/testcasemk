<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateNewsCommand extends ContainerAwareCommand
{
    protected static $defaultName = 'app:create-news';

    protected function configure()
    {
        $this
            ->setDescription('Create a new post')
            ->addOption('title',null,  InputOption::VALUE_REQUIRED, 'News title')
            ->addOption('text',null,  InputOption::VALUE_REQUIRED, 'News text')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $title = $input->getOption('title');
        $text = $input->getOption('text');

        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');

        $product = new \App\Entity\News;
        $product->setTitle($title);
        $product->setText($text);
        $product->setPublishedAt(new \DateTime("now"));

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        $io->success($title.' '.$text);
    }
}
