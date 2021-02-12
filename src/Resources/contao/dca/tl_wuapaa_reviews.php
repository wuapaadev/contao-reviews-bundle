<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

$GLOBALS['TL_DCA']['tl_wuapaa_reviews'] = array
(
    'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_wuapaa_reviews_elements'),
		'switchToEdit'                => true,
		'enableVersioning'            => true,
		'markAsCopy'                  => 'title',
		/*'onload_callback' => array
		(
			array('tl_news_archive', 'checkPermission'),
			array('tl_news_archive', 'generateFeed')
		),
		'oncreate_callback' => array
		(
			array('tl_news_archive', 'adjustPermissions')
		),
		'oncopy_callback' => array
		(
			array('tl_news_archive', 'adjustPermissions')
		),
		'onsubmit_callback' => array
		(
			array('tl_news_archive', 'scheduleUpdate')
		),*/
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
    ),
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'href'                => 'table=tl_wuapaa_reviews_elements',
				'icon'                => 'edit.svg'
			),
			'editheader' => array
			(
				'href'                => 'act=edit',
				'icon'                => 'header.svg',
				'button_callback'     => array('tl_wuapaa_reviews', 'editHeader')
			),
			'copy' => array
			(
				'href'                => 'act=copy',
				'icon'                => 'copy.svg',
				'button_callback'     => array('tl_wuapaa_reviews', 'copyArchive')
			),
			'delete' => array
			(
				'href'                => 'act=delete',
				'icon'                => 'delete.svg',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
				'button_callback'     => array('tl_wuapaa_reviews', 'deleteArchive')
			),
			'show' => array
			(
				'href'                => 'act=show',
				'icon'                => 'show.svg'
			)
		)
	),
	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('type', 'protected'),
		'default'                     => '{title_legend},title;{type_legend:hide},type;{protected_legend:hide},protected'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'protected'                   => 'groups',
		'type_gm'               => 'apiID,apiKey',
		'type_gp'				=> 'apiKey'
	),

    'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default 0"
		),
		'title' => array
		(
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
        ),
		'protected' => array
		(
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'groups' => array
		(
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'foreignKey'              => 'tl_member_group.name',
			'eval'                    => array('mandatory'=>true, 'multiple'=>true),
			'sql'                     => "blob NULL",
			'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
		),
		'type' => array
		(
			'exclude'                 => false,
			'search'                  => true,
			'inputType'               => 'select',
			'options'				  => ['gm' => 'Google Maps Api', 'gp' => 'Google Places Api'],
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'apiID' => array
		(
			'exclude'                 => false,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'apiKey' => array
		(
			'exclude'                 => false,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
    )
);


class tl_wuapaa_reviews extends Contao\Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->import('Contao\BackendUser', 'User');
	}



	public function editHeader($row, $href, $label, $title, $icon, $attributes)
		{
			return $this->User->canEditFieldsOf('tl_wuapaa_reviews') ? '<a href="' . $this->addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . Contao\StringUtil::specialchars($title) . '"' . $attributes . '>' . Contao\Image::getHtml($icon, $label) . '</a> ' : Contao\Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)) . ' ';
		}
	
	public function copyArchive(){}
	public function deleteArchive(){}

}