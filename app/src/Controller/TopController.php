<?php
namespace Eightpockets\Web\Controller;
use Eightpockets\Web\Controller\Web;

class TopController extends Web
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
    }

    /**
     * 描画処理
     *
     * @return void
     */
    protected function render()
    {
//        var_dump(get_class($this->app));
        $this->app->renderer->render($this->response, 'index.phtml', $this->args);
    }

}
