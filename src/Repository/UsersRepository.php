<?php

namespace App\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;

readonly class UsersRepository
{
    public function __construct(private Connection $connection)
    {
    }

    /**
     * @throws Exception
     */
    public function getAllUsers(): array
    {
        $query = 'SELECT * FROM users';

        return $this->connection->fetchAllAssociative($query);
    }
}
