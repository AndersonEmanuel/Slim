<?php

$app->add(new \Application\Http\Middleware\AccessControlOrigin());
$app->add(new \Application\Http\Middleware\HttpBasicAuthentication());
