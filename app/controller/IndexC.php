<?php
namespace app\controller;

class IndexC extends ControllerBase
{
	public function indexAction()
	{
		$PostsAR = $this->Load('PostsAR');
    	//$this->View->hoge �֊��蓖�Ă邱�ƂŁA��Ɏg�p����e���v���[�g���Ŋ��蓖�Ă��ϐ����g�p�ł���悤�ɂȂ�܂��B
   		 $this->View->postslist = $PostsAR->all();
	}
}