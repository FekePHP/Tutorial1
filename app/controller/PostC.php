<?php
namespace app\controller;

class PostC extends ControllerBase
{
	public function ViewAction ()
	{
	    $PostsAR = $this->Load('PostsAR');
	    //find()はテーブル内のレコートを一件取得し、値をオブジェクトとして返します。
	    //このコードでは、URLに記載された「id」パラメータの値をfind()に渡すことでテーブルからレコードを参照しています。
	    $this->View->post = $PostsAR->find($this->Input->id);
	}
}