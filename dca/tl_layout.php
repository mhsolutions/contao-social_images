<?php

/**
 * social_images extension for Contao Open Source CMS
 *
 * Copyright (C) 2013 Codefog
 *
 * @package social_images
 * @author  Codefog <http://codefog.pl>
 * @author  Kamil Kuzminski <kamil.kuzminski@codefog.pl>
 * @license LGPL
 */


/**
 * Extend a tl_layout palette
 */
$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] .= ';{socialImages_legend:hide},socialImages;{twitterCard_legend:hide},twitterCard';

/**
 * Extend tl_layout __selector__
 */
$GLOBALS['TL_DCA']['tl_layout']['palettes']['__selector__'] = array_merge($GLOBALS['TL_DCA']['tl_layout']['palettes']['__selector__'], array('socialImages', 'twitterCard'));
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['socialImages'] = 'socialImages_limit,socialImages_size,socialImages_resize';
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['twitterCard'] = 'twitterCard_site';

/**
 * Add the field to tl_layout
 */
$GLOBALS['TL_DCA']['tl_layout']['fields']['socialImages'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['socialImages'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange' => true, 'tl_class'=>'clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['socialImages_limit'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['socialImages_limit'],
	'default'                 => 10,
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['socialImages_size'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['socialImages_size'],
	'default'                 => array('200', '200'),
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('multiple'=>true, 'size'=>2, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['socialImages_resize'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['socialImages_resize'],
    'exclude'                 => true,
    'inputType'               => 'imageSize',
    'options_callback'        => function() { return System::getImageSizes(); },
    'reference'               => &$GLOBALS['TL_LANG']['MSC'],
    'eval'                    => array('rgxp'=>'natural', 'includeBlankOption'=>true, 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['twitterCard'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['twitterCard'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange' => true, 'tl_class'=>'clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['twitterCard_site'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['twitterCard_site'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>16, 'tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default ''"
);
