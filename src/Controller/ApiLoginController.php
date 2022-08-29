<?php
/**
 * Api Login Connector
 *
 * PHP version >= 8.0
 *
 * @category   Division.
 * @package    Api
 * @subpackage Controller
 * @author     Kamil Jakubowicz <kamil.jakubowicz@salesbook.com>
 * @copyright  2022 Kamil Jakubowicz
 * @license    Owner Kamil Jakubowicz
 * @link       none
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

/**
 * Class ApiLoginController
 *
 * PHP version >= 8.0
 *
 * @category   Division.
 * @package    Api
 * @subpackage Controller
 * @author     Kamil Jakubowicz <kamil.jakubowicz@salesbook.com>
 * @license    Owner Kamil Jakubowicz
 * @link       none
 */
class ApiLoginController extends AbstractController
{


    /**
     * Metoda inicjująca formularz rejestracyjny.
     *
     * @param $user sprawdzanie użytkownika
     *
     * @return void
     * @throws Exception
     */
    public function index(#[CurrentUser] ?User $user, Request $request): Response
    {
        if (null === $user) {
            return $this->json([
            'message' => 'missing credentials',
            ], Response::HTTP_UNAUTHORIZED);
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
