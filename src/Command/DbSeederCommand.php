<?php

namespace App\Command;

use Doctrine\DBAL\Connection;
use Exception;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

#[AsCommand(
    name: 'app:db-seeder',
    description: 'Seed the database',
)]
class DbSeederCommand extends Command
{
    public function __construct(
        private Connection $connection,
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $num = random_int(1, 100);
            $username = 'admin' . $num;
            $query = "INSERT INTO users (username) VALUES(:username);";
            $this->connection->executeStatement($query, ['username' => $username]);
        } catch (Exception|Throwable $e) {
            $output->writeln($e->getMessage());
            return Command::FAILURE;
        }

        $output->writeln("User {$username} was created.");
        return Command::SUCCESS;
    }
}
