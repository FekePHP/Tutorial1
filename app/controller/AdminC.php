<?php
namespace app\controller;

class AdminC extends ControllerBase
{
	
	protected $_form = array(
	    //入ちょくが必須かつ長さ20文字まで
	    'title'  => ['type' => 'text', 'rule' => 'Required|MaxLength:20'],
	    //長さ500文字までかつ、nullを許可
	    'body'   => ['type' => 'textarea', 'rule' => 'AllowEmpty|MaxLength:500'],
	    'button' => ['type' => 'submit'],
	);
	
	public function IndexAction ()
	{
		$PostsAR = $this->Load('PostsAR');
		$this->View->postslist = $PostsAR->all();
	}
	
	public function AddAction ()
	{
	    $this->View->form = $this->Fieldset->get($this->_form);
	}
	
	public function AddPost ()
	{
	    $PostsAR = $this->Load('PostsAR');
	    //Fieldsetのrun()メソッドは与えられたルールに従って検証を行います。
	    //検証成功した場合の返り値はtrue,失敗した場合はfalseなのでif文でそのまま使用します。
	    if ($this->Fieldset->run($this->_form)) {
	        $PostsAR->title = $this->Input->title;
	        $PostsAR->body = $this->Input->body;
	        $PostsAR->created = date('Y-m-d H:i:s');
	        $PostsAR->save();
	        $this->Session->setFlash('msg', "記事「{$this->Input->title}」を挿入しました。");
	        $this->jump();
	    } else {
	        $this->View->msg = '入力内容が違っています。';
	    }
	}
	
	public function editAction ()
	{
	    $PostsAR = $this->Load('PostsAR');
	    //IDを取得し、find()メソッドからレコードのデータを取得します。
	    //その取得したデータをFieldsetに挿入することで、フォームにデフォルト値として使用できます。
	    $post = $PostsAR->find($this->Input->id);
	    $this->Fieldset->setValue($post);
	    $this->View->form = $this->Fieldset->get($this->_form);
	}
	
	public function editPost ()
	{
	    $PostsAR = $this->Load('PostsAR');
	    //検証結果がtrueの場合
	    if ($this->Fieldset->run($this->_form)) {
	        //findにIDを指定した後にsave()することで、
	        //そのIDのレコードがあった場合は更新、なかった場合は挿入します。
	        $PostsAR->find($this->Input->id);
	        //更新するフィールドに値をセット
	        $PostsAR->title = $this->Input->title;
	        $PostsAR->body = $this->Input->body;
	        $PostsAR->modified = date('Y-m-d H:i:s');
	        //save()を呼び出すことでここまでセットした内容を挿入します。
	        $PostsAR->save();
	        //完了メッセージ
	        $this->Session->setFlash('msg', "記事「{$this->Input->title}」を更新しました。");
	        //リロード対策
	        $this->jump('index');
	    } else {
	        //検証失敗メッセージ
	        $this->View->msg = '入力内容が違っています。';
	    }
	}
	
	public function deleteAction ()
	{
	    $PostsAR = $this->Load('PostsAR');
	    try {
	        $title = $PostsAR->find($this->Input->id)->title;
	        //IDを取得し、delete()メソッドでレコードの削除を試みます。
	        $post = $PostsAR->delete($this->Input->id);
	        //完了メッセージ
	        $this->Session->setFlash('msg', "記事「{$title}」を削除しました。");
	    } catch (\Error $e) {
	        //失敗メッセージ
	        $this->Session->setFlash('msg', "記事「{$title}」を削除に失敗しました。");
	    }
	    //今回のアクションでは、削除が終わった際に、管理画面のトップに戻りたいので、
	    //jump()の第一引数にアクション名Indexを渡すことで、
	    //同じコントローラ内のIndexアクションにリダイレクトするように設定できます。
	    $this->jump('index');
	}
}