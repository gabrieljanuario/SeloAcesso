<?php
App::uses('AppModel', 'Model');

class SignReport extends AppModel
{
	public $name = 'SignReort';
	public $useTable = 'signs_reports';
	public $actsAs = array('Containable');
		
}
