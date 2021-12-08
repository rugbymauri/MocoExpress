<?php

namespace App\Command;

use App\Client\MocoClient;
use App\Model\UserPresence;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TouchCommand extends Command
{
    protected static $defaultName = 'touch';

    public function __construct(
        private MocoClient $mocoClient
    )
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($this->mocoClient->touchUserPresence()) {
            $presences = $this->mocoClient->getUserPresences(new \DateTime(), new \DateTime());

            /** @var UserPresence $presence */
            foreach ($presences as $presence) {
                $output->writeln('Date' . $presence->getDate()->format('Y-m-d'));
                $output->writeln('From' . $presence->getFrom());
                $output->writeln('To' . $presence->getTo());
                $output->writeln('');

            }
        } else {
            $output->writeln('<error>Something is wrong</error>');
        }


        return Command::SUCCESS;

    }
}