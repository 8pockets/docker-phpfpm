<?php
namespace Eightpockets\Web;

class Route{

    /*
    * ルーティングを設定
    * @param object $app slimのインスタンス
    *
    * @return void
    */
    function __construct($app){
        $this->_app = $app;
    }

    /*
    * ルーティングを設定
    * @param object $app slimのインスタンス
    *
    * @return void
    */
    public function addRoute(){

        /**
         * Example GET route
         *
         * @param  \Psr\Http\Message\ServerRequestInterface $req  PSR7 request
         * @param  \Psr\Http\Message\ResponseInterface      $res  PSR7 response
         * @param  array                                    $args Route parameters
         *
         * @return \Psr\Http\Message\ResponseInterface
         */
        $this->_app->get('/',                   '\Eightpockets\Web\Controller\TopController:run');
        $this->_app->get('/news[/{params:.*}]', '\Eightpockets\Web\Controller\NewsController:run');

        $this->_app->get('/hoge/{name}', function ($request, $response) {
            $name = $request->getAttribute('name');
            $response->getBody()->write("Hello, $name");

            return $response;
        });
    }

}
