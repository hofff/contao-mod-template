<?php

namespace Hofff\Contao\ModTemplate;

/**
 * @author Tristan Lins <tristan.lins@infinitysoft.de>
 * @author Oliver Hoff <oliver@hofff.com>
 */
class ContentDCA extends \Backend {

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
		$sql = 'SELECT pid FROM tl_article WHERE id = ?';
		$article = \Database::getInstance()->prepare($sql)->limit(1)->execute($dc->activeRecord->pid);

		$page = $this->getPageDetails($article->pid);

		$sql = 'SELECT pid FROM tl_layout WHERE id = ?';
		$layout = \Database::getInstance()->prepare($sql)->limit(1)->execute($page->layout);

		return $this->getTemplateGroup('tpl_', $layout->pid);
	}

}
