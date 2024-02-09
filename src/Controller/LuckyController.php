<?php

declare(strict_types=1);

namespace App\Controller;

use Random\RandomException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    /**
     * @throws RandomException
     */
    #[Route('/lucky/number', format: 'json')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->json(['number' => $number]);
    }
}
