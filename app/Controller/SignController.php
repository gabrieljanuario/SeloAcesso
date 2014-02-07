<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');


class SignController extends AppController {

	public $name = 'Sign';
	
	public $uses = array('SignReport');

	public function index()
	{
	
	}
	
	
	public function validaters($client)
	{
	
		if (!empty($client)){
			$client = Sanitize::clean($client, array('encode' => false));
			$signInfo = $this->Sign->find('first',
				array(
					'conditions' => array(
						'Sign.id' => $client
					)
				)
			);
			
			if(!empty($signInfo)){		
	       		$this->set('sign', $signInfo);
				$this->set('body_class', 'valid'); 
	       		
			
			
			}else{
				$this->redirect(array('controller' => 'sign', 'action' => 'invalid'));			
			}

		}else{		
			$this->redirect(array('controller' => 'sign', 'action' => 'invalid'));
		}	
	}

	public function reportit()
	{
		if ($this->request->is('post') && (!empty($this->request->data['Sign'])))
		{
		
			$data = Sanitize::clean($this->request->data, array('encode' => false, 'escape' => false));

			// SAVE DATA
			$this->SignReport->create();
			if ($this->SignReport->save($data['Sign']['reportit'])){				

				// SEND MAIL
					// 1. SIGN REPORT RECEIVED
					$to = Configure::read('Mail.DefaultTo');
					$subject = 'testando';
					$template = 'sign_report_received';
					$vars = array(
						'title' => $data['Sign']['reportit']['name'],
						'txt' => $data['Sign']['reportit']['url'] 
					);
					return $this->sendMailSmtp($to, $subject, $template, $vars);		
					
					// 2. USER REPORTED
					
					
			}
				
		}
		
		
	}	
	
	public function invalid()
	{
	
	
	}	
	
	
	
}
