<?php
namespace Eightpockets\Web;

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
        $app->get('/',                   '\Eightpockets\Web\Controller\TopController:run');
        $app->get('/news[/{params:.*}]', '\Eightpockets\Web\Controller\NewsController:run');

    }

}
