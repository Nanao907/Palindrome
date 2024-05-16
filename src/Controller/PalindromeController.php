<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PalindromeController extends AbstractController
{
    #[Route('/', name: 'palindrome_check')]
    public function index(Request $request): Response
    {
        $result = null;
        $input = $request->request->get('input');

        if ($input !== null) {
            $normalizedInput = strtolower(preg_replace('/\W+/', '', $input));
            $result = $normalizedInput === strrev($normalizedInput);
        }

        return $this->render('palindrome.html.twig', [
            'result' => $result,
            'input' => $input,
        ]);
    }
}
