<?php
namespace app\controller;

class IndexC extends ControllerBase
{
	public function indexAction()
	{
		$PostsAR = $this->Load('PostsAR');
    	//$this->View->hoge へ割り当てることで、後に使用するテンプレート内で割り当てた変数が使用できるようになります。
   		 $this->View->postslist = $PostsAR->all();
	}
}