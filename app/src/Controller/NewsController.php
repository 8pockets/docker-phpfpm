<?php
namespace Eightpockets\Web\Controller;

use Eightpockets\Web\Controller\Web;

class NewsController extends Web
{
    /**
     * 前処理
     *
     * @throws WebException リクエストパラメータエラーの場合
     *
     * @return void
     */
    protected function preprocess()
    {
    }
    /**
     * メイン処理
     *
     * @return void
     */
    protected function process()
    {
        $this->args['params_array'] = explode("/", $this->request->getAttribute('params'));

        $pdo = $this->app->get('pdo');
/*
        $stmt = $pdo->prepare("INSERT INTO users (id, name, value) VALUES (:id, :name, :value)");
        $stmt->bindValue(':id', 4, \PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->bindValue(':value', 4, \PDO::PARAM_INT);

        $name = 'four';
        $stmt->execute();
*/
        //select
        $sql = 'select * from users;';
        $stmt = $pdo->query($sql);

        $result = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        $this->args['users'] = $result;

    }
    /**
     * 描画処理
     *
     * @return void
     */
    protected function render()
    {
        $this->app->renderer->render($this->response, 'news.phtml', $this->args);
    }

}
