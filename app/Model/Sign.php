<?php
App::uses('AppModel', 'Model');

class Sign extends AppModel
{
	public $name = 'Sign';
	public $useTable = 'signs';
	public $whitelist = array('id', 'url', 'created');
	public $actsAs = array('Containable');
		
}
