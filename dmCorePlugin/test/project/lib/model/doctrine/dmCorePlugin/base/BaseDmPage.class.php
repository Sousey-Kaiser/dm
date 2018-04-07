<?php

/**
 * BaseDmPage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $module
 * @property string $action
 * @property integer $record_id
 * @property string $slug
 * @property string $name
 * @property string $title
 * @property string $h1
 * @property string $description
 * @property string $keywords
 * @property string $auto_mod
 * @property boolean $is_active
 * @property boolean $is_secure
 * @property string $credentials
 * @property boolean $is_indexable
 * 
 * @method string  getModule()       Returns the current record's "module" value
 * @method string  getAction()       Returns the current record's "action" value
 * @method integer getRecordId()     Returns the current record's "record_id" value
 * @method string  getSlug()         Returns the current record's "slug" value
 * @method string  getName()         Returns the current record's "name" value
 * @method string  getTitle()        Returns the current record's "title" value
 * @method string  getH1()           Returns the current record's "h1" value
 * @method string  getDescription()  Returns the current record's "description" value
 * @method string  getKeywords()     Returns the current record's "keywords" value
 * @method string  getAutoMod()      Returns the current record's "auto_mod" value
 * @method boolean getIsActive()     Returns the current record's "is_active" value
 * @method boolean getIsSecure()     Returns the current record's "is_secure" value
 * @method string  getCredentials()  Returns the current record's "credentials" value
 * @method boolean getIsIndexable()  Returns the current record's "is_indexable" value
 * @method DmPage  setModule()       Sets the current record's "module" value
 * @method DmPage  setAction()       Sets the current record's "action" value
 * @method DmPage  setRecordId()     Sets the current record's "record_id" value
 * @method DmPage  setSlug()         Sets the current record's "slug" value
 * @method DmPage  setName()         Sets the current record's "name" value
 * @method DmPage  setTitle()        Sets the current record's "title" value
 * @method DmPage  setH1()           Sets the current record's "h1" value
 * @method DmPage  setDescription()  Sets the current record's "description" value
 * @method DmPage  setKeywords()     Sets the current record's "keywords" value
 * @method DmPage  setAutoMod()      Sets the current record's "auto_mod" value
 * @method DmPage  setIsActive()     Sets the current record's "is_active" value
 * @method DmPage  setIsSecure()     Sets the current record's "is_secure" value
 * @method DmPage  setCredentials()  Sets the current record's "credentials" value
 * @method DmPage  setIsIndexable()  Sets the current record's "is_indexable" value
 * 
 * @package    retest
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDmPage extends myDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dm_page');
        $this->hasColumn('module', 'string', 127, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 127,
             ));
        $this->hasColumn('action', 'string', 127, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 127,
             ));
        $this->hasColumn('record_id', 'integer', null, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('slug', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('h1', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('keywords', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('auto_mod', 'string', 6, array(
             'type' => 'string',
             'notnull' => true,
             'default' => 'snthdk',
             'length' => 6,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => true,
             ));
        $this->hasColumn('is_secure', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('credentials', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('is_indexable', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => true,
             ));


        $this->index('recordModuleAction', array(
             'fields' => 
             array(
              0 => 'module',
              1 => 'action',
              2 => 'record_id',
             ),
             'type' => 'unique',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $nestedset0 = new Doctrine_Template_NestedSet();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'slug',
              1 => 'name',
              2 => 'title',
              3 => 'h1',
              4 => 'description',
              5 => 'keywords',
              6 => 'auto_mod',
              7 => 'is_active',
              8 => 'is_secure',
              9 => 'is_indexable',
             ),
             'length' => 7,
             ));
        $this->actAs($nestedset0);
        $this->actAs($i18n0);
    }
}