<?php
class IndexController extends Controller
{
	public function index($id,$name)
	{
        echo $id.' '.$name.' ';
	}
    public function testModel()
    {
        //$this->render('test',array('name'=>'jeff'));
	$user = $this->load_model('user');
	$user->index();
    }
    public function test()
    {
    }
    	
}
