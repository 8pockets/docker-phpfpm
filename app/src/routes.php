<?php
namespace Eightpockets\Web;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Route{

    /*
    * ルーティングを設定
    * @param object $app slimのインスタンス
    *
    * @return void
    function __construct(){
    }
    */

    /*
    * ルーティングを設定
    * @param object $app slimのインスタンス
    *
    * @return void
    */
    public static function addRoute($app){

        /**
         * Example GET route
         *
         * @param  \Psr\Http\Message\ServerRequestInterface $req  PSR7 request
         * @param  \Psr\Http\Message\ResponseInterface      $res  PSR7 response
         * @param  array                                    $args Route parameters
         *
         * @return \Psr\Http\Message\ResponseInterface
         */
        $app->get('/news[/{params:.*}]', '\Eightpockets\Web\Controller\NewsController:run');

/*
        $app->get('/[{name}]', function ($request, $response, $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton / route");
            //$this->getContainer()->get('logger'); も同じ意味

            return $this->renderer->render($response, 'index.phtml', $args);
        });
*/
    }

}
