<?php

/**
 * BaseDmRecordPermission
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $secure_module
 * @property string $secure_action
 * @property string $secure_model
 * @property integer $secure_record
 * @property string $description
 * @property Doctrine_Collection $Users
 * @property Doctrine_Collection $Groups
 * 
 * @method string              getSecureModule()  Returns the current record's "secure_module" value
 * @method string              getSecureAction()  Returns the current record's "secure_action" value
 * @method string              getSecureModel()   Returns the current record's "secure_model" value
 * @method integer             getSecureRecord()  Returns the current record's "secure_record" value
 * @method string              getDescription()   Returns the current record's "description" value
 * @method Doctrine_Collection getUsers()         Returns the current record's "Users" collection
 * @method Doctrine_Collection getGroups()        Returns the current record's "Groups" collection
 * @method DmRecordPermission  setSecureModule()  Sets the current record's "secure_module" value
 * @method DmRecordPermission  setSecureAction()  Sets the current record's "secure_action" value
 * @method DmRecordPermission  setSecureModel()   Sets the current record's "secure_model" value
 * @method DmRecordPermission  setSecureRecord()  Sets the current record's "secure_record" value
 * @method DmRecordPermission  setDescription()   Sets the current record's "description" value
 * @method DmRecordPermission  setUsers()         Sets the current record's "Users" collection
 * @method DmRecordPermission  setGroups()        Sets the current record's "Groups" collection
 * 
 * @package    retest
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDmRecordPermission extends myDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dm_record_permission');
        $this->hasColumn('secure_module', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('secure_action', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('secure_model', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('secure_record', 'integer', 14, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 14,
             ));
        $this->hasColumn('description', 'string', 1000, array(
             'type' => 'string',
             'length' => 1000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('DmUser as Users', array(
             'refClass' => 'DmRecordPermissionUser',
             'local' => 'dm_record_permission_id',
             'foreign' => 'dm_user_id'));

        $this->hasMany('DmGroup as Groups', array(
             'refClass' => 'DmRecordPermissionGroup',
             'local' => 'dm_record_permission_id',
             'foreign' => 'dm_group_id'));
    }
}