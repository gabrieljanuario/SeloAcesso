<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');
App::uses('Log', 'Model');
App::uses('String', 'Utility');
App::uses('Sanitize', 'Utility');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	public function beforeSave($options = array())
	{
		if (empty($this->id) && empty($this->data[$this->alias]['id']))
		{
			$this->data[$this->alias]['created'] = date('Y-m-d H:i:s');
			
			if (!empty($this->modelAttribute))
			{
				$this->data[$this->alias]['model'] = $this->modelAttribute;
			}
			
			if (!empty($this->whitelist))
			{
				array_push($this->whitelist, 'model', 'foreign_key', 'hash', 'created');
			}
		}
		else
		{
			$this->data[$this->alias]['updated'] = date('Y-m-d H:i:s');
			
			if (!empty($this->whitelist))
			{
				array_push($this->whitelist, 'updated');
			}
		}
		
		return parent::beforeSave($options);
	}

	
	

}
