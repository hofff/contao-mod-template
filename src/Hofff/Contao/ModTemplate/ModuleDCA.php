<?php

namespace Hofff\Contao\ModTemplate;

/**
 * @author Tristan Lins <tristan.lins@infinitysoft.de>
 * @author Oliver Hoff <oliver@hofff.com>
 */
class ModuleDCA extends \Backend {

	/**
	 */
	public function __construct() {
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	/**
	 * Return all templates as array
	 *
	 * @param \DataContainer
	 * @return array
	 */
	public function getTemplates($dc) {
		return $this->getTemplateGroup('tpl_', $dc->activeRecord->pid);
	}

}
