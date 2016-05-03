<?php
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app->get('/news[/{params:.*}]', function (ServerRequestInterface $request, ResponseInterface $response, $args) {

    $args['params_array'] = explode("/", $request->getAttribute('params'));

    return $this->renderer->render($response, 'foo.phtml', $args);
});

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton / route");

    return $this->renderer->render($response, 'index.phtml', $args);
});
