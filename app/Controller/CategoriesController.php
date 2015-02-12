<?php
App::uses('AppController','Controller');

class CategoriesController extends AppController
{

	public function admin_index()
	{

		$categories = $this->Category->find('all',array(
			'order' => array('position ASC'),
			'conditions' => array('active' => 1)
			)
		);
		$this->set(compact('categories'));
		
	}

	public function admin_edit($id = null)
	{
		if(!empty($this->request->data))
		{
			$this->Category->save($this->request->data);
			$this->Session->setFlash("La catégorie a bien été modifié",'flash',array('class' => 'success'));
			$this->redirect(array('action' => 'index', 'admin' => true));
		}
		elseif($id != null)
		$this->request->data = $this->Category->findById($id);

	}

	public function admin_delete($category_id)
	{
		$category = $this->Category->findById($category_id,'id');

		if(empty($category) || !$this->request->is('post'))
		throw new NotFoundException();

		$this->Category->delete($category['Category']['id']);
		$this->Session->setFlash("Cette catégorie a bien été supprimé",'flash',array('class' => 'success'));
		$this->redirect($this->referer());
	}

	public function updateList() {

		
		if($this->request->is('ajax'))
		{
			$position = 1;
			$elements = $this->request->data['Element'];

			debug($elements);

			foreach ($elements as $key => $element) {

				 $this->Category->id=$element;
    			 $this->Category->saveField("position","$position");

				  $this->Category->save();

				 $position++;
			}

			$categories = $this->Category->find('all',array(
				'order' => array('position ASC'),
				'conditions' => array('active' => 1)
				)
			);
			$this->set(compact('categories'));

			$this->render("admin_index");
		}
	}

	public function ajax_add($id = null)
	{
		
		if($this->request->is('ajax'))
		{
			$count = $this->Category->find('count');

			$this->request->data['Category']['position'] = $count+1;
			
			if(!empty($this->request->data))
			{

				$this->Category->save($this->request->data);
				$this->Session->setFlash("La catégorie a bien été ajouté",'flash',array('class' => 'success'));
				$categories = $this->Category->find('all',array(
					'order' => array('position ASC'),
					'conditions' => array('active' => 1)
				)
				);
				$this->set(compact('categories'));

			}
			elseif($id != null)
			$this->request->data = $this->Category->findById($id);

			$this->render("admin_index");
		}

	}

	public function ajax_delete() 
	{

		

		if($this->request->is('ajax')) 
		{
			$id = $this->request->data['id'];
			if($id != null)
			{
				$this->Category->id=$id;

				$posts = $this->Category->Post->find('all',array(
					'conditions' => array('category_id' => $id)
					)
				);
				
				foreach ($posts as $key => $p) {

					$this->Category->Post->save(array(
					'id' =>  $p['Post']['id'],
					'online' => 0
					)
				);

				}
				
				$this->Category->saveField("active",0);
				$this->Session->setFlash("Cette catégorie a bien été supprimé",'flash',array('class' => 'success'));
			}
		}

		$categories = $this->Category->find('all',array(
					'order' => array('position ASC'),
					'conditions' => array('active' => 1)
					)
				);
				$this->set(compact('categories'));
		$this->render("admin_index");
	}

	public function menu()
	{
		
		$menu = $this->Category->find('all',array(
			'conditions' => array('Category.online' => 1),
			'contain'	=> array('SubCategory'),
			'recursive' => 1
			    
			)
		);

	

	/*	foreach ($menu as $k => $c)
		{

			$menu[$k]['menu'] = $this->SubCategory->find('all', array(
			'conditions' => array('SubCategory.category_id' => $c['Category']['id'], 'online' => 1)
				)
			);
		}
		*/
		return $menu;
	}
}