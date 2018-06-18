<?php
class Driver extends AppModel
{
    var $name='Driver';
    var $primaryKey='driver_id';
    var $displayField ='d_name';
    var $order = "Driver.driver_id DESC";
    var $actsAs=array('MeioUpload' => array('d_profile_image' => array('dir' => DRIVER_PROFILE_IMAGES, 'create_directory' => true, 'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png'),'allowed_ext' => array('.jpg', '.jpeg', '.png'), 'thumbsizes' => array('small' => array('width' => 134, 'height' => 101, 'maxDimension' => '', 'thumbnailQuality' => 100, 'zoomCrop' => true),'medium' => array('width' => 192, 'height' => 144, 'maxDimension' => '', 'thumbnailQuality' => 100, 'zoomCrop' => true),))));
    
    var $conditions=array('Driver.d_active' => 1);
    var $belongsTo=array('Image'=>array('className'=>'Image', 'foreignKey' => 'd_rc'),'Insorance'=>array('className'=>'Image', 'foreignKey' => 'd_license_id'), 'Car'=>array('className' => 'Car', 'foreignKey' => 'car_id',));
    var $hasMany=array();
    var $validate=array(
        'd_email' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter the email id'
            ),
        ),
        'd_email' => array
            (
            'isUnique' => array
                (
                'rule' => array('isUnique', true),
                'message' => 'Email Exists, Try Again.'
            ),
        ),
        'd_active' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    
    function beforeSave()
    {
       	if(isset($this->data['Driver']['d_fname']) && isset($this->data['Driver']['d_lname']) )
       	{
        	$this->data['Driver']['d_name'] = $this->data['Driver']['d_fname']." ".$this->data['Driver']['d_lname'];
        }
        if (isset($this->data['Driver']['d_profile_image']) && ! empty($this->data['Driver']['d_profile_image']))
        {
            $this->data['Driver']['d_profile_image_url']= MENU_URL . DRIVER_PROFILE_IMAGES . $this->data['Driver']['d_profile_image'];
        }
        if(isset($this->data['Driver']['driver_id']) && $this->data['Driver']['driver_id'])
        {
            $this->data['Driver']['d_modified']= date('Y-m-d H:i:s');
        }
        else
        {
            $this->data['Driver']['api_key']= md5($this->data['Driver']['d_email']);
            $this->data['Driver']['d_created']= date('Y-m-d H:i:s');
            $this->data['Driver']['d_modified']= date('Y-m-d H:i:s');
        }
        return true;
    }

}
