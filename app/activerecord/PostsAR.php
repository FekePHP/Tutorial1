<?php
namespace app\activerecord;
class PostsAR extends \feke\base\ActiveRecordBase
{
    public function __construct()
    {
        //このモデルで利用するデータベース
        //CoreConfigクラスで指定したデフォルトのデータベースのプロパティ名を指定してください。
        //※配列で渡した場合は、その配列の値で接続します。
        $this->connect('main');
        //このモデルで操作するテーブル名
        $this->setMainTable('posts');
        //主キーのセット
        $this->setPrimary ('id');
        //主キーのオートインコメントの有無
        //trueの場合は、insertの際に主キーをセットしませんが、
        //falseの場合は、主キーの最大値+1をセットします。
        $this->_auto_increment = true;
        //テーブルのデータの自動取得
        //trueの場合、テーブルのカラムを自動で取得し、検証ルールを自動で作成します。
        $this->_auto_setting = false;
        //データを更新、挿入する際に与えられたルールを元にして、検証を行います。
        $this->_check_input = false;
        //ルールの設定
        //すべてのカラムを宣言する必要があります
        $this->_col_rule = array(
        	['name' => 'title'],
        	['name' => 'body'],
        	['name' => 'created'],
        	['name' => 'modified'],
        );
        parent::__construct();
    }
}