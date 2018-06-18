<?php

class AppModel extends Model
{

    //------------------
    function addChildCount(&$data, $parentField)
    {
        for ($i=0; $i < sizeof($data); $i ++ )
        {
            $data[$i][$this->alias]['children_count']=$this->find('count', array('conditions' => array($parentField => $data[$i][$this->alias]['id']), 'recursive' => -1));
        }
    }

    //------------------
    function addHierarchyInfo(&$data, $parentField)
    {
        foreach ($data as $key => $value)
        {
            $data[$key]=$this->getAncestors($key, $parentField);
        }
        asort($data);
    }

    function addHierarchyInfoM(&$data, $parentField)
    {
        foreach ($data as $key => $value)
        {
            $data[$key]=$this->getAncestorMs($key, $parentField);
        }
        asort($data);
    }

    //------------------
    function getAncestorMs($id, $parentField)
    {
        App::import('Model', 'Category');
        $category=new Category();
        $slant="";
        $entity=$this->find('first', array('conditions' => array("{$this->alias}.id" => ($id)), 'fields' => array("{$this->alias}.id", 'name', $parentField), 'recursive' => 2));
        $slant=$entity["{$this->alias}"]['name'];

        if (isset($entity['Category']['name']))
        {
            $slant=$entity['Category']['name'] . ' | ' . $slant;
        }
        return $slant;
    }

    function getAncestors($id, $parentField)
    {
        $slant="";
        $entity=$this->find('first', array('conditions' => array("{$this->alias}.id" => $id), 'fields' => array("{$this->alias}.id", 'page_name', $parentField), 'recursive' => -1));
        $slant=$entity["{$this->alias}"]['page_name'];
        while ($entity["{$this->alias}"][$parentField] != 0)
        {
            $entity=$this->find('first',
                    array('conditions' => array("{$this->alias}.id" => $entity["{$this->alias}"][$parentField]), 'fields' => array("{$this->alias}.id", 'page_name', $parentField), 'recursive' => -1));
            $slant=$entity["{$this->alias}"]['page_name'] . ' | ' . $slant;
        }
        return $slant;
    }

    //------------------
    function checkUnique($data, $fields)
    {
        if ( ! is_array($fields))
        {
            $fields=array($fields);
        }
        foreach ($fields as $key)
        {
            $tmp[$key]=$this->data[$this->name][$key];
        }
        if (isset($this->data[$this->name][$this->primaryKey]))
        {
            $tmp[$this->primaryKey]="<>" . $this->data[$this->name][$this->primaryKey];
        }
        return $this->isUnique($tmp, false);
    }

}

?>