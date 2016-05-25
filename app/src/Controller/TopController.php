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
        $this->response = $this->response->withStatus(200);

        $this->response = $this->response->withHeader(
            'Content-Type',
            'text/html;charset=utf-8'
        );
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
        $this->app->renderer->render($this->response, 'index.phtml', $this->args);
    }

}
