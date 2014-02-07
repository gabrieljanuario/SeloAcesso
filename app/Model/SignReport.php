<?php
App::uses('AppModel', 'Model');

class SignReport extends AppModel
{
	public $name = 'SignReort';
	public $useTable = 'signs_report';
	public $actsAs = array('Containable');
		
}
