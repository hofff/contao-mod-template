<?php

namespace Hofff\Contao\ModTemplate;

/**
 * @author Oliver Hoff <oliver@hofff.com>
 */
trait TemplateTrait {

	/**
	 * @see \Contao\ContentElement::generate()
	 * @see \Contao\Module::generate()
	 */
	public function generate() {
		if(TL_MODE == 'BE') {
			$tpl = new \BackendTemplate('be_wildcard');

			$label = isset($GLOBALS['FE_USER_TEMPLATE'][$this->mod_template])
				? $GLOBALS['FE_USER_TEMPLATE'][$this->mod_template]
				: $this->mod_template;
			$tpl->wildcard = '### TEMPLATE: ' . $label . ' ###';

			return $tpl->parse();
		}

		$this->strTemplate = $this->mod_template;

		return parent::generate();
	}

	/**
	 * @see \Contao\ContentElement::compile()
	 * @see \Contao\Module::compile()
	 */
	protected function compile() {
	}

	/**
	 * Generate ajax request
	 *
	 * @return string
	 */
	public function generateAjax() {
		return $this->generate();
	}

}
