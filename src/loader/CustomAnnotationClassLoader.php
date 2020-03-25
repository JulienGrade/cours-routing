<?php


namespace App\Loader;


use Symfony\Component\Routing\Loader\AnnotationClassLoader;
use Symfony\Component\Routing\Route;

class CustomAnnotationClassLoader extends AnnotationClassLoader
{

    protected function configureRoute(Route $route, \ReflectionClass $class, \ReflectionMethod $method, $annot)
    {
        $route->addDefaults([
           '_controller' => $class->name . '@' . $method->name
        ]);
        // TODO: Implement configureRoute() method.
    }
}