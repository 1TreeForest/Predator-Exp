<?php


/**
 * class CategoryTree
 * This is a class for storing general config using the MPTT implementation
 */

class ConfigTree extends Tree
{
    /*
    *	This just sits on top of the parent constructor, only a shell so that the _table var gets set
    */
    public function __construct($root, $root_type = ROOT_TYPE_ID)
    {
        $this->_table = "config";
        parent::__construct($root, $root_type);
    }
}
