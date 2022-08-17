<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class ApiLoginController extends AbstractController
{
   
    #[Route('/api/login', name: 'api_login')]
    public function index(#[CurrentUser] ?User $user): JsonResponse
    {
print_r($user);die;
        if (null === $user) {
            return $this->json([
                'message' => 'missing credentials',
                ], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $token = '123'; 

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ApiLoginController.php',
            'user'  => $user->getUserIdentifier(),
            'token' => $token,
        ]);
    }
}
