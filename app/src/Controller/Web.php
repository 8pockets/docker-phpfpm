<?php
namespace Eightpockets\Web\Controller;
use Eightpockets\Web\Controller\Base;

/**
 * web controler base
 */
abstract class Web extends Base
{
    protected $app;

    /**
     * construct.
     *
     * @return void
     */
    public function __construct($app)
    {
//      parent::__construct();
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
    public function run($request, $response, $args)
    {
        // main process
        try {
            $this->preprocess();
            $this->process();
            $this->render();
        } catch ( WebException $e ) {
            $this->logger->info('massage : '.$e->getStatus().$e->getMessage().$e->getFile().$e->getLine().$e->getDetail());
            return;
        }
        return;
    }

}
