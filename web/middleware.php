<?php

$app->add(new \Application\Middleware\AccessControlOrigin());
$app->add(new \Application\Middleware\HttpBasicAuthentication());
