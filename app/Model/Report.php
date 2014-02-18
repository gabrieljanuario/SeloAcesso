<?php
App::uses('AppModel', 'Model');

class Report extends AppModel
{
	public $name = 'Report';
	public $useTable = 'reports';
	public $actsAs = array('Containable');
		
}
