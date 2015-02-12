<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController
{

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('login','forgot','password','logout','add');
		if($this->Auth->user('id') > 0)
		{
			$this->Auth->deny(array('login','forgot','password'));
		}
	}

	public function login()
	{

	
		if(!empty($this->request->data) && $this->request->is('post'))
		{
		
		
			if($this->Auth->login())
			{
				debug("ok");
				$this->Session->setFlash("Vous êtes maintenant connecté", 'flash', array('class' => 'success'));
				return $this->redirect('/admin');
			}
			else
			$this->Session->setFlash("Une erreur est survenue durant l'authentification", 'flash', array('class' => 'alert'));
		}
	}
	
	public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        }
     }

	public function logout()
	{
		$this->request->data = array();
		debug("test");
		if($this->Auth->logout())
		{
			$this->Session->setFlash("Vous avez été déconnecté", 'flash', array('class' => 'success'));
			$this->redirect(array('action' => 'login'));
		}
	}

	public function forgot()
	{
		if($this->request->data)
		{
			debug("test");
			$user = $this->User->findByMail($this->request->data['User']['mail'], array('id'));
			debug($user);
			if(empty($user))
			{
				$this->Session->setFlash("Ce email n\'est associé à aucun compte", 'flash', array('class' => 'error'));
			}
			else
			{
				App::uses('CakeEmail', 'NetWork/Email');
				$token = md5(time() .'-'. uniqid());
				$this->User->id = $user['User']['id'];
				$this->User->saveField('token',$token);

				$CakeEmail = new CakeEmail('smtp');
				$CakeEmail->to($this->request->data['User']['mail']);
				$CakeEmail->subject("Demande de réinitialisation du mot de passe");
				$CakeEmail->viewVars(array('token' => $token, 'id' => $user['User']['id']));
				$CakeEmail->emailFormat('text');
				$CakeEmail->template('password');
				$CakeEmail->send();

				$this->Session->setFlash("Votre demande a bien été prit en compte", 'flash', array('class' => 'success'));
				$this->redirect(array('action' => 'login'));
			}

		}
		
	}


	public function password($user_id,$token)
	{

		$user = $this->User->find('first',array(
			'fields'	 => array('id'),
			'conditions' => array(
				'id' => $user_id,
				'token' => $token
				)
		));

		if(empty($user))
		{
			$this->Session->setFlash("Lien eronné", 'flash', array('class' => 'error'));
			$this->redirect(array('action' => 'forgot'));
		}

		if(!empty($this->request->data))
		{
			$this->User->create($this->request->data);


				$this->User->create();
				$this->User->save(array(
					'id'	 => $user['User']['id'],
					'password' => $this->Auth->password($this->request->data['User']['password']),
					'active' => 1,
					'token'  => ''
				));

				$this->Session->setFlash("Votre mot de passe a bien été modifié", 'flash', array('class' => 'success'));
				$this->redirect(array('action' => 'login'));

		}

	}
}