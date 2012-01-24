<?php

namespace Fuel\Migrations;

class Create_chats
{
	public function up()
	{
		\DBUtil::create_table('chats', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'user' => array('constraint' => 20, 'type' => 'varchar'),
			'message' => array('constraint' => 200, 'type' => 'varchar'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('chats');
	}
}