<?php
use Orm\Model;

class Model_Chat extends Model
{
	protected static $_properties = array(
		'id',
		'user',
		'message',
	);


	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('user', 'User', 'required|max_length[20]');
		$val->add_field('message', 'Message', 'required|max_length[200]');

		return $val;
	}

}
