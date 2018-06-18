<?php
class Car extends AppModel
{
    var $name='Car';
    var $primaryKey='car_id';
    var $displayField = 'car_name';
    var $order = 'Car.car_id DESC';
    //var $actsAs=array('MeioUpload' => array('car_profile_image' => array('dir' => CAR_PROFILE_IMAGES, 'create_directory' => true, 'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png'),'allowed_ext' => array('.jpg', '.jpeg', '.png'), 'thumbsizes' => array('small' => array('width' => 134, 'height' => 101, 'maxDimension' => '', 'thumbnailQuality' => 100, 'zoomCrop' => true),'medium' => array('width' => 192, 'height' => 144, 'maxDimension' => '', 'thumbnailQuality' => 100, 'zoomCrop' => true),))));
    
    var $conditions=array('Car.active' => 1);
    var $belongsTo=array('Category'=>array('className' => 'Category', 'foreignKey' => 'category_id',));
    var $hasMany=array();
    var $validate=array(
        'car_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'car_reg_no' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'car_reg_no' => array
            (
            'isUnique' => array
                (
                'rule' => array('isUnique', true),
                'message' => 'Registration Number Exists, Try Again.'
            ),
        ),
        'active' => array(
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
        if (isset($this->data['Car']['car_profile_image']) && ! empty($this->data['Car']['car_profile_image']))
        {
            $this->data['Car']['car_profile_image_url']= MENU_URL . CAR_PROFILE_IMAGES . $this->data['Car']['car_profile_image'];
        }
        if(isset($this->data['Car']['car_id']) && $this->data['Car']['car_id'])
        {
            $this->data['Car']['car_modified']= date('Y-m-d H:i:s');
        }
        else
        {
            $this->data['Car']['car_created']= date('Y-m-d H:i:s');
            $this->data['Car']['car_modified']= date('Y-m-d H:i:s');
        }
        return true;
    }
    
    function SaveCar($data)
    {
        $insertCarId = 0;
        $catData['Car']['category_id'] = $data['Car']['category_id'];
        $catData['Car']['image_id'] = 0;
        $catData['Car']['car_name'] = $data['Car']['car_name'];
        $catData['Car']['car_desc'] = $data['Car']['car_desc'];
        $catData['Car']['car_reg_no'] = $data['Car']['car_reg_no'];
        $catData['Car']['car_model'] = $data['Car']['car_model'];
        $catData['Car']['car_currency'] = 'Dollar';
        $catData['Car']['car_fare_per_km'] = 0;
        $catData['Car']['car_fare_per_min'] = 0;
        $catData['Car']['car_profile_image'] = '';
        $catData['Car']['car_profile_image_url'] = '';
        $catData['Car']['active'] = 1;

        //print_r($catData); exit;
        
        if(isset($data['Car']['car_id']) && $data['Car']['car_id'])
        {
            $catData['Car']['car_id'] = $data['Car']['car_id'];
            $this->id = $catData['Car']['car_id'];
            $this->save($catData);
            $insertCarId = $catData['Car']['car_id'];
        }
        else
        {
            $this->create();
            $this->save($catData);
            $insertCarId = $this->id;
        }
        return $insertCarId;
    }

}
