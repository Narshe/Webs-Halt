<?php
App::uses('AppController','Controller');


class PostsController extends AppController
{

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('show');

	}

	
	public function show($menu)
	{

		
		$IdMenu = $this->Post->Category->findByName($menu,array('id'));
		$posts ="";
		if(!empty($IdMenu))
		{
			$posts = $this->Post->find('all',array(
				'conditions' => array('menu_id' => $IdMenu['Menu']['id'])
				)
			);

		}
		else
		throw new NotFoundException();
		
	
	/*	$posts = $this->Post->find('all',array(
			'conditions' => array('Post.online' => 1),
			'fields' => array('Post.name,Post.content,Post.created'),
			'order'  => array('Post.created DESC')
			)
		);
	*/
	
		$this->set(compact('posts'));
		$this->render('../Pages/'.$menu.'');
	}
	
	public function admin_undefined() {

	}

	public function admin_index()
	{

		$posts = $this->Post->find('all');
		
		$this->set(compact('posts'));
	}

	public function admin_edit($id = null)
	{
		$categories = $this->Post->Category->find('list', array(
			'conditions' => array('active' => 1
				)
			)
		);

		if(!empty($this->request->data))
		{
			$this->request->data['type'] = 'post';
			$this->request->data['slug'] = 'A-voir';

			if($this->Post->save($this->request->data))
			{
				$this->Session->setFlash('Cet article a bien été edité','flash', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			}
		}
		elseif($id)
		{
			$this->request->data = $this->Post->findById($id);
			if(empty($this->request->data))
			{
				$this->Session->setFlash('Cet article n\'existe pas','flash',array('class' => 'error'));
				return $this->redirect(array('action' => 'index'));
			}
		}
		
		$this->set(compact('categories','id'));
	}

	public function admin_delete($id)
	{
		if($this->request->is('post') && $id !=0)
		{
			if($this->Post->findById($id))
			{
				$this->Post->delete($id);
				$this->Session->setFlash('Cet article a bien été supprimé','flash',array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));

			}
		}
		throw new NotFoundException();
	}
}
?>


