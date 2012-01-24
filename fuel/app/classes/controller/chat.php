<?php
class Controller_Chat extends Controller_Template 
{

	public function action_index()
	{
		$data['chats'] = Model_Chat::find('all');
		$data['lastmessage'] = Model_Chat::find()->max('id');
		$data['path'] = Config::get('base_url');
		$this->template->title = "Chat";
		$this->template->content = View::forge('chat/index', $data);
	}
/*
	public function action_view($id = null)
	{
		$data['chat'] = Model_Chat::find($id);

		$this->template->title = "Chat";
		$this->template->content = View::forge('chat/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST' && \Security::check_token())
		{
			$val = Model_Chat::validate('create');
			
			if ($val->run())
			{
				$chat = Model_Chat::forge(array(
					'user' => Input::post('user'),
					'message' => Input::post('message'),
				));

				if ($chat and $chat->save())
				{
					Session::set_flash('success', 'Added chat #'.$chat->id.'.');

					Response::redirect('chat');
				}

				else
				{
					Session::set_flash('error', 'Could not save chat.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Chats";
		$this->template->content = View::forge('chat/create');

	}

	public function action_edit($id = null)
	{
		$chat = Model_Chat::find($id);
		$val = Model_Chat::validate('edit');

		if ($val->run())
		{
			$chat->user = Input::post('user');
			$chat->message = Input::post('message');

			if ($chat->save())
			{
				Session::set_flash('success', 'Updated chat #' . $id);

				Response::redirect('chat');
			}

			else
			{
				Session::set_flash('error', 'Could not update chat #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$chat->user = $val->validated('user');
				$chat->message = $val->validated('message');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('chat', $chat, false);
		}

		$this->template->title = "Chats";
		$this->template->content = View::forge('chat/edit');

	}

	public function action_delete($id = null)
	{
		if ($chat = Model_Chat::find($id))
		{
			$chat->delete();

			Session::set_flash('success', 'Deleted chat #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete chat #'.$id);
		}

		Response::redirect('chat');

	}
*/

}
