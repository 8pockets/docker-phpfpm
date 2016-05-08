<?php
namespace Eightpockets\Web\Controller;

use \Slim\Slim;

class Base
{
    protected $app;

    function __construct($app){
        $this->app = \Slim::getInstance();
    }

}
