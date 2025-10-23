<?php

namespace Bluecadet;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PhpCsChecksCommand extends Command {

  protected function configure(): void {
    $this
      // ->setName('run-phpcs') //if this gets included, it would execute with `composer run-phpcs` instead
      ->setDescription('Custom description for this command')
      ->setDefinition([
        new InputOption('arbitrary-flag', NULL, InputOption::VALUE_NONE, 'Example flag'),
        new InputArgument('foo', InputArgument::OPTIONAL, 'Optional arg'),
      ])
      ->setHelp(
                "Here you can define a long description for your command\n" .
                "This would be visible with composer my-cmd --help"
            );
  }

  public function execute(InputInterface $input, OutputInterface $output): int {
    if ($input->getOption('arbitrary-flag')) {
      $output->writeln('The flag was used');
    }

    // Example command
    $command = './vendor/bin/phpcs --standard=PSR12 src/';
    $lastLine = exec($command);
    $output->writeln("Last line of output: " . $lastLine);

    $fullOutput = shell_exec($command);
    $output->writeln("Full output:\n" . $fullOutput);

    return Command::SUCCESS;

    // return 0;
  }

}
