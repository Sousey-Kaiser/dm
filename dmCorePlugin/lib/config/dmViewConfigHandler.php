<?php

class dmViewConfigHandler extends sfViewConfigHandler
{
	public function execute($configFiles)
  {
    // parse the yaml
    $this->yamlConfig = self::getConfiguration($configFiles);

    // init our data array
    $data = array();

    $data[] = "\$response = \$this->context->getResponse();\n\n";

    // first pass: iterate through all view names to determine the real view name
    $first = true;
    foreach ($this->yamlConfig as $viewName => $values)
    {
      if ($viewName == 'all')
      {
        continue;
      }

      $data[] = ($first ? '' : 'else ')."if (\$this->actionName.\$this->viewName == '$viewName')\n".
                "{\n";
      $data[] = $this->addTemplate($viewName);
      $data[] = "}\n";

      $first = false;
    }

    // general view configuration
    $data[] = ($first ? '' : "else\n{")."\n";
    $data[] = $this->addTemplate($viewName);
    $data[] = ($first ? '' : "}")."\n\n";

    // second pass: iterate through all real view names
    $first = true;
    foreach ($this->yamlConfig as $viewName => $values)
    {
      if ($viewName == 'all')
      {
        continue;
      }

      $data[] = ($first ? '' : 'else ')."if (\$templateName.\$this->viewName == '$viewName')\n".
                "{\n";

      $data[] = $this->addLayout($viewName);
      $data[] = $this->addComponentSlots($viewName);
      $data[] = $this->addHtmlHead($viewName);
      $data[] = $this->addEscaping($viewName);

      $data[] = $this->addHtmlAsset($viewName);

      $data[] = "}\n";

      $first = false;
    }

    // general view configuration
    $data[] = ($first ? '' : "else\n{")."\n";

    $data[] = $this->addLayout();
    $data[] = $this->addComponentSlots();
    $data[] = $this->addHtmlHead();
    $data[] = $this->addEscaping();

    $data[] = $this->addHtmlAsset();
    $data[] = ($first ? '' : "}")."\n";

    // compile data
    $retval = sprintf("<?php\n".
                      "// auto-generated by dmViewConfigHandler\n".
                      "// date: %s\n%s\n",
                      date('Y/m/d H:i:s'), implode('', $data));

    return $retval;
  }

	protected function addHtmlHead($viewName = '')
	{
		$data = array();

		foreach ($this->mergeConfigValue('http_metas', $viewName) as $httpequiv => $content)
		{
			$data[] = sprintf("  \$response->addHttpMeta('%s', '%s', true);", $httpequiv, str_replace('\'', '\\\'', $content));
		}

		foreach ($this->mergeConfigValue('metas', $viewName) as $name => $content)
		{
			$data[] = sprintf("  \$response->addMeta('%s', '%s', false, false);", $name, str_replace('\'', '\\\'', preg_replace('/&amp;(?=\w+;)/', '&', htmlspecialchars($content, ENT_QUOTES, sfConfig::get('sf_charset')))));
		}

		foreach ($this->mergeConfigValue('og_tags', $viewName) as $name => $content)
		{
			$data[] = sprintf("  \$response->addOgTag('%s', '%s', true, false);", $name, str_replace('\'', '\\\'', preg_replace('/&amp;(?=\w+;)/', '&', htmlspecialchars($content, ENT_QUOTES, sfConfig::get('sf_charset')))));
		}

		return implode("\n", $data)."\n";
	}
}