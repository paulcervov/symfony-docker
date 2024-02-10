<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UsersRepository;

class UsersController extends AbstractController
{
    public function __construct(private readonly UsersRepository $usersRepository)
    {
    }

    #[Route('/users/fetch', format: 'json')]
    public function fetch(): Response
    {
        $users = $this->usersRepository->getAllUsers();

        return $this->json(['users' => $users]);
    }
}
