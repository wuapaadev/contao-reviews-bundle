<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

$GLOBALS['TL_DCA']['tl_wuapaa_reviews_elements'] = array
(
    'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_wuapaa_reviews',
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
	'list' => array(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'headerFields'          => ['title'],
			'panelLayout'             => '',
			'child_record_callback' => ['tl_wuapaa_reviews_elements', 'listElements'],
		),
		'label' => array
		(
			'fields'                  => array('title','placesID','placesresult'),
			'format'                  => '%s'
		),
	),
	'operations' => array(
		'show' => array
			(
				'href'                => 'act=show',
				'icon'                => 'show.svg'
			)
	),
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid' => array
		(
			'foreignKey'              => 'tl_wuapaa_reviews.title',
			'sql'                     => "int(10) unsigned NOT NULL default 0",
			'relation'                => array('type'=>'belongsTo', 'load'=>'lazy')
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
		'placesID' => array
		(
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
        ),
		'placesresult' => array
		(
			'exclude'                 => true,
			'search'                  => true,
			'default'				  => '',
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true),
			'sql'                     => "text NOT NULL default ''"
        )
	),

		
);
class tl_wuapaa_reviews_elements extends Contao\Backend
{
	public function listElements($arrRow)
    {
		
        $key    = $arrRow['published'] ? 'published' : 'unpublished';
        $return = '<div><strong>' . $arrRow['title'] . '</strong></div><div>'.$arrRow['placesresult'].'</div>'
                  . "\n";

        return $return;
    }
}