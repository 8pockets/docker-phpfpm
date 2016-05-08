<?php
namespace Eightpockets\Web;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Eightpockets\Web\Model\DatabaseHandler;

class Route{

    /*
    * ルーティングを設定
    * @param object $app slimのインスタンス
    *
    * @return void
    function __construct(){
        $this->app = $app;
    }
    */

    /*
    * ルーティングを設定
    * @param object $app slimのインスタンス
    *
    * @return void
    */
    public static function addRoute($app){

        $app->get('/news[/{params:.*}]', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
            Controller\NewsController::run($request, $response, $args);
        });

        $app->get('/[{name}]', function ($request, $response, $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton / route");

            return $this->renderer->render($response, 'index.phtml', $args);
        });
    }

}
