<?php
namespace Eightpockets\Web\Controller;

class NewsController extends Base
{
    function __construct(){

        parent::__construct();
    }

    public static function run($request, $response, $args){

        $args['params_array'] = explode("/", $request->getAttribute('params'));

        //insert
        $pdo = \Eightpockets\Web\Model\DatabaseHandler::init();

        $stmt = $pdo->prepare("INSERT INTO users (id, name, value) VALUES (:id, :name, :value)");
        $stmt->bindValue(':id', 4, \PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->bindValue(':value', 4, \PDO::PARAM_INT);

        $name = 'four';
        $stmt->execute();

        //select
        $sql = 'select * from users;';
        $stmt = $pdo->query($sql);

        $result = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        $args['users'] = $result;

        return $this->app->renderer->render($response, 'foo.phtml', $args);
    }

}
