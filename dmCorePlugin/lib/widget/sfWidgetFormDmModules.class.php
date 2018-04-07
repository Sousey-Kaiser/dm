<?php
class sfWidgetFormDmModules extends sfWidgetFormChoice
{
  public function __construct($options = array(), $attributes = array())
  {
    $modules = dmContext::getInstance()->getModuleManager()->getModules();
    $options['choices'] = array_combine($modules, $modules);
    
    parent::__construct($options, $attributes);
  }
}