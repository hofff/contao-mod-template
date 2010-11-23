<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  InfinitySoft 2010
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @package    ModTemplate
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


/**
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][]  = 'mod_template';
$GLOBALS['TL_DCA']['tl_content']['palettes']['mod_template']    = '{type_legend},type;{config_legend},mod_template;{protected_legend:hide},protected;{expert_legend:hide},guests';
$GLOBALS['TL_DCA']['tl_content']['palettes']['tpl_hello_world'] = '{type_legend},type;{config_legend},mod_template,html;{protected_legend:hide},protected;{expert_legend:hide},guests';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['mod_template'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['mod_template'],
	'default'                 => '',
	'inputType'               => 'select',
	'options_callback'        => array('tl_content_template', 'getTemplates'),
	'reference'               => &$GLOBALS['FE_USER_TEMPLATE'],
	'eval'                    => array('tl_class'=>'clr', 'submitOnChange'=>true)
);

/**
 * Class tl_content_template
 * 
 * Helper class for tl_content table.
 * @copyright  InfinitySoft 2010
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @package    ModTemplate
 */
class tl_content_template extends Backend
{
	/**
	 * Return all templates as array
	 * @param object
	 * @return array
	 */
	public function getTemplates(DataContainer $dc)
	{	
		// Get the page ID
		$objArticle = $this->Database->prepare("SELECT pid FROM tl_article WHERE id=?")
									 ->limit(1)
									 ->execute($dc->activeRecord->pid);

		// Inherit the page settings
		$objPage = $this->getPageDetails($objArticle->pid);

		// Get the theme ID
		$objLayout = $this->Database->prepare("SELECT pid FROM tl_layout WHERE id=?")
									->limit(1)
									->execute($objPage->layout);

		// Return all templates
		return $this->getTemplateGroup('tpl_', $objLayout->pid);
	}
}

?>