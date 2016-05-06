<?php
namespace Eightpockets\Web;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Eightpockets\Web\Model\DatabaseHandler;

$app->get('/news[/{params:.*}]', function (ServerRequestInterface $request, ResponseInterface $response, $args) {

    $args['params_array'] = explode("/", $request->getAttribute('params'));

    //insert
    $pdo = DatabaseHandler::databaseHandler();
/*
    $stmt = $pdo->prepare("INSERT INTO users (id, name, value) VALUES (:id, :name, :value)");
    $stmt->bindValue(':id', 1, \PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
    $stmt->bindValue(':value', 1, \PDO::PARAM_INT);

    $name = 'one';
    $stmt->execute();
*/

    //select
    $sql = 'select * from users';
    $stmt = $pdo->query($sql);

    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    $args['name'] = $result['name'];
    $args['value'] = $result['value'];

    return $this->renderer->render($response, 'foo.phtml', $args);
});

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton / route");

    return $this->renderer->render($response, 'index.phtml', $args);
});
