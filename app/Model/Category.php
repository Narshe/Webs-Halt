<?php


class Category extends AppModel
{

	public $hasMany = array('Post','Category');

	/*
	public function afterFind($results, $primary = false)
	{
		foreach ($results as $k => $r)
		{
			if(isset($r[$this->alias]['id'],$r[$this->alias]['slug']))
			{
				$r[$this->alias]['link'] = array(
					'controller' => 'posts',
					'action'	 => 'show_all',
					'slug'       =>  $r[$this->alias]['slug']
			
					);
			}
			$results[$k] = $r;
		}

		return $results;
	}
	*/
}