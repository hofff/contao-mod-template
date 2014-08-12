<?php

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
$GLOBALS['TL_DCA']['tl_content']['metapalettes']['mod_template'] = array(
	'type'		=> array('type'),
	'config'	=> array('mod_template'),
	'protected'	=> array(':hide', 'protected'),
	'expert'	=> array(':hide', 'guests'),
);
$GLOBALS['TL_DCA']['tl_content']['metapalettes']['tpl_hello_world extends mod_template'] = array(
	'+config'	=> array('html'),
);

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
