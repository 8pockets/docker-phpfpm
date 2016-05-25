<?php
namespace Eightpockets\Web\Controller;
use Eightpockets\Web\Controller\Base;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

/**
 * web controler base
 */
abstract class Web extends Base
{
    protected $app;
    protected $request;
    protected $response;
    protected $args;

    /**
     * construct
     *
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * 前処理、主にバリデーションやログインのチェック
     *
     * @return void
     */
    abstract protected function preprocess();
    /**
     * メイン処理、APIやDBの操作など
     *
     * @return void
     */
    abstract protected function process();
    /**
     * 描画処理、テンプレート変数の設定など
     *
     * @return void
     */
    abstract protected function render();

    /**
     * メイン処理
     *
     * @return void
     */
    public function run(Request $request, Response $response, $args)
    {
        $this->request = $request;
        $this->response = $response;
        $this->args = $args;

        // main process
        try {
            $this->preprocess();
            $this->process();
            $this->render();
        } catch ( WebException $e ) {
            $this->logger->info('massage : '.$e->getStatus().$e->getMessage().$e->getFile().$e->getLine().$e->getDetail());
            return;
        }
        return $this->response;
    }

}
