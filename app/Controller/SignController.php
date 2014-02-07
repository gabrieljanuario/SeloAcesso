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
			$this->SignReport->save($data['Sign']['reportit']);				

			// SEND MAIL
			$to = "gabriel@grupow2b.com.br";
			$subject = 'testando';
			$template = 'sign_report_received';
			$vars = array(
				'storeTitle' => 'TESTE',
				'from' => 'contato@grupow2b.com.br'
			);

			return $this->sendMailSmtp($to, $subject, $template, $vars);		

		}
		
		
	}	
	
	public function invalid()
	{
	
	
	}

	
	
	public function sendMailSmtp($to, $subject, $template, $vars){
			
			$email = new CakeEmail('smtp');
			$email->helpers(array('Html'));
			$email->to($to);
			$email->subject($subject);				
			$email->viewVars($vars);
			$email->template($template, 'default');
			
			if (stripos($to, "facebook.com") !== false){
				$email->emailFormat('text');
			}else{
				$email->emailFormat('both');
			}		
			
			if($email->send()){ return "1"; } else{ return "0"; }		
	}
	
	
	
	
	
	
}
