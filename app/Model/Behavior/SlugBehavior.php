<?php

class SlugBehavior extends ModelBehavior
{
	public function setup(Model $Model,$settings = array())
	{
		if(!isset($this->settings[$Model->alias]))
		{
			$this->settings[$Model->alias] = array(
				'field' => 'slug',
				'separator' => '-',
				'original'  => 'name'
			);
		}
		$this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], $settings);
	}

	public function beforeSave(Model $Model,$options = array())
	{
		$slugField = $this->settings[$Model->alias]['field'];
		$nameField = $this->settings[$Model->alias]['original'];

		if(isset($Model->data[$Model->alias][$nameField]) &&
			(
				!isset($Model->data[$Model->alias][$slugField]) ||
				empty($Model->data[$Model->alias][$slugField])
			)
		)
		{
			$Model->data[$Model->alias][$slugField] = strtolower(Inflector::slug($Model->
				data[$Model->alias][$nameField], $this->settings[$Model->alias]['separator']));
		}

	}
}