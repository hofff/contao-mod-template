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
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['template'] = '{title_legend},name,type;{config_legend},template;{protected_legend:hide},protected;{expert_legend:hide},guests';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['template'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['template'],
	'default'                 => '',
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_template', 'getTemplates'),
	'eval'                    => array('tl_class'=>'clr w50')
);

/**
 * Class tl_module_template
 * 
 * Helper class for tl_module table.
 * @copyright  InfinitySoft 2010
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @package    ModTemplate
 */
class tl_module_template extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}
	
	/**
	 * Return all news templates as array
	 * @param object
	 * @return array
	 */
	public function getTemplates(DataContainer $dc)
	{
		return $this->getTemplateGroup('tpl_', $dc->activeRecord->pid);
	}
}

?>