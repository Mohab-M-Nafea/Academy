<?php

namespace App\Traits;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait RouteTrait
{
    function previous_route()
    {
        $previousRequest = app('request')->create(app('url')->previous());

        try {
            $routeName = app('router')->getRoutes()->match($previousRequest)->getName();
        } catch (NotFoundHttpException $exception) {
            return null;
        }

        return $routeName;
    }
}
