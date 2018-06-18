<?php
class Page extends AppModel
{
	var $name = 'Page';
	var $displayField = 'page_name';
	var $conditions = array('Page.active'=>1);
	var $belongsTo = array('ParentPage' => array('className' => 'Page','foreignKey' => 'page_id'),);
	var $hasMany = array('ChildPage' => array('className' => 'Page','foreignKey' => 'page_id','dependent' => false));
	var $validate = array('header_image' => array('Empty' => array('check' => false),'InvalidExt'=>array('message' => 'This file extension is not allowed')),'name' => array('notEmptyRule' => array('rule' => 'notEmpty','message' => 'Name is required.')));
	var $actsAs = array('MeioUpload' => array('header_image' => array('dir' => HEADER_PAGE_IMAGES,'create_directory' => true,'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png'),'allowed_ext' => array('.jpg', '.jpeg', '.png'),'thumbsizes' => array( 
            'small' => array('width' =>134, 'height' =>101,'maxDimension' => '', 'thumbnailQuality' => 100, 'zoomCrop' => true),
            'medium' => array('width'=>192, 'height'=>144,'maxDimension' => '', 'thumbnailQuality' => 100, 'zoomCrop' => true),
        ))),'Sluggable', 'Tree' => array('parent'=>'page_id'));
}
