<?php
class Controller_Chatajax extends Controller_Rest
{
	public function get_last()
    {
		$data = Model_Chat::find()->where('id', '>', Input::get('id'))->order_by('id', 'asc')->get();
        $this->response($data, 200);
    }

	public function post_message()
    {
		$response['status']="0";
		
		$chat = Model_Chat::forge(array(
			'user' => Input::post('user'),
			'message' => Input::post('message'),
		));

		if ($chat and $chat->save())
		{
			$response['status']=1;
		}
		
        $this->response($response);
    }

}
