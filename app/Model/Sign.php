<?php
App::uses('AppModel', 'Model');

class Sign extends AppModel
{
	public $name = 'Sign';
	public $useTable = 'signs';
	public $whitelist = array('id', 'url', 'razao_social', 'created', 'results');
	public $actsAs = array('Containable');
		
}
