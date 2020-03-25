<?php


namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    /**
     * @Route("/hello/{name}", name="hello", defaults={"name": "World"})
     * @param array $currentRoute
     */
    public function sayHello(array $currentRoute) {
        require __DIR__ . '/../../pages/hello.html.php';
    }
}