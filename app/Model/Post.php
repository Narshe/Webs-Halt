<?php

class Post extends AppModel
{
	public $belongsTo = array('Category');
	public $actsAs = array('Media.Media');
	
}