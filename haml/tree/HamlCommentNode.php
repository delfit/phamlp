<?php
/* SVN FILE: $Id$ */
/**
 * HamlNode class file.
 * @author Chris Yates
 * @copyright Copyright &copy; 2010 PBM Web Development
 * @license http://www.yiiframework.com/license/
 */

/**
 * HamlNode class.
 * Base class for all Haml nodes.
 * @author Chris Yates
 * @copyright Copyright &copy; 2010 PBM Web Development
 * @license http://www.yiiframework.com/license/
 */
class HamlCommentNode extends HamlNode {
	private $isConditional;

	public function __construct($content) {
	  $this->content = $content;
		$this->isConditional = (bool)preg_match('/^\[.+]$/', $line[HamlParser::HAML_CONTENT], $matches);
	}

	public function getIsConditional() {
		return $this->isConditional;
	}

	public function render() {
		$output  = $this->renderer->renderOpenComment($this);
		foreach ($this->children as $child) {
			$output .= $child->render();
		} // foreach
		$output .= $this->renderer->renderCloseComment($this);
	  return $this->debug($output);
	}
}