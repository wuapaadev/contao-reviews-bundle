<?php

use Wuapaa\ContaoReviewsBundle\Controller\FrontendModule\ContaoReviewsFrontendModuleController;
use Contao\Backend;
use Contao\BackendUser;
use Contao\Controller;
use Contao\DataContainer;
use Contao\System;

$GLOBALS['TL_DCA']['tl_module']['palettes'][ContaoReviewsFrontendModuleController::TYPE] = '{title_legend},name,type;{reviews_legend},reviews,reviews_template';
/*$GLOBALS['TL_DCA']['tl_module']['palettes']['reviews'] .= '{content_legend},googlePlacesID,googlePlacesKey;{template_legend:hide},customTpl;';
$GLOBALS['TL_DCA']['tl_module']['palettes']['reviews'] .= '{protected_legend:hide},protected;{expert_legend:hide},guests;{invisible_legend:hide},invisible,start,stop';
*/

/**

 * Add fields to tl_module

 */
$GLOBALS['TL_DCA']['tl_module']['fields']['reviews'] = array(

    'label' => &$GLOBALS['TL_LANG']['tl_module']['reviews'],
    'exclude' => true,
    'sorting' => true,
    'flag' => 1,
    'search' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_module_reviews','getReviewsList'),
    'eval' => array('mandatory' => true, 'maxlength' => 3),
    'sql' => "varchar(3) NOT NULL default ''",

);

$GLOBALS['TL_DCA']['tl_module']['fields']['reviews_template'] = array
(
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback' => static function ()
	{
		return Contao\Controller::getTemplateGroup('reviews_');
	},
	'eval'                    => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

class tl_module_reviews extends Contao\Backend
{
    public function __construct()
	{
		parent::__construct();
		$this->import('Contao\BackendUser', 'User');
	}

	/**
	 * Get all news archives and return them as array
	 *
	 * @return array
	 */
	public function getReviewsList()
	{
		
		$arrReviews = array();
		$objReviews = $this->Database->execute("SELECT id, title FROM tl_wuapaa_reviews ORDER BY title");

		while ($objReviews->next())
		{
			/*if ($this->User->hasAccess($objArchives->id, 'reviews'))
			{*/
				$arrReviews[$objReviews->id] = $objReviews->title;
			//}
		}
       
		return $arrReviews;
	}
}