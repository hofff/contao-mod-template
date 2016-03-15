<?php

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][]  = 'mod_template';
$GLOBALS['TL_DCA']['tl_module']['metapalettes']['mod_template'] = array(
	'title'		=> array('name', 'type'),
	'config'	=> array('mod_template'),
	'protected'	=> array(':hide', 'protected'),
	'expert'	=> array(':hide', 'guests'),
);
$GLOBALS['TL_DCA']['tl_module']['metapalettes']['tpl_hello_world extends mod_template'] = array(
	'+config'	=> array('html'),
);

$GLOBALS['TL_DCA']['tl_module']['fields']['mod_template'] = array(
	'label'				=> &$GLOBALS['TL_LANG']['tl_module']['mod_template'],
	'default'			=> '',
	'inputType'			=> 'select',
	'options_callback'	=> array('Hofff\\Contao\\ModTemplate\\ModuleDCA', 'getTemplates'),
	'reference'			=> &$GLOBALS['FE_USER_TEMPLATE'],
	'eval'				=> array(
		'submitOnChange'	=> true,
		'tl_class'			=> 'clr',
	),
	'sql'				=> 'varchar(255) NOT NULL default \'\'',
);
