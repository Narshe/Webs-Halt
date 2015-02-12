<?php
App::uses('AppController','Controller');

class SubCategoriesController  extends AppController
{
	public function admin_index()
	{
		$this->SubCategory->contain('Category.name');
		$subCategories = $this->Paginate('SubCategory');


		$this->set(compact('subCategories'));
	}

	public function admin_edit($id = null)
	{
		$categories = $this->SubCategory->Category->find('list');
		if(!empty($this->request->data))
		{
			$this->SubCategory->save($this->request->data);
			$this->Session->setFlash("Cette sous-catégorie a bien été editer",'flash',array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		elseif($id)
		{
			$this->request->data = $this->SubCategory->findById($id);
		}
		$this->set(compact('categories'));
	}

	public function admin_delete($subCategories_id)
	{
		if($this->request->is('post'))
		{
			$subCategory = $this->SubCategory->findById($subCategories_id);
			if(!empty($subCategory))
			{
				$this->SubCategory->delete($subCategory['SubCategory']['id']);
				$this->Session->setFlash("Cette sous-catégorie a bien été supprimé",'flash',array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash("Cette sous-catégorie n\'existe pas",'flash',array('class' => 'error'));
				$this->redirect($this->referer);
			}
		}
		else
		throw new NotFoundException();
	}

	

}