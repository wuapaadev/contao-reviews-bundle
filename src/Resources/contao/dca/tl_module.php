<?php
use Wuapaa\ContaoReviewsBundle\Controller\FrontendModule\ContaoReviewsFrontendModuleController;

$GLOBALS['TL_DCA']['tl_module']['palettes'][ContaoReviewsFrontendModuleController::TYPE] = '{title_legend},name,type;{redirect_legend},jumpTo';
/*$GLOBALS['TL_DCA']['tl_module']['palettes']['reviews'] .= '{content_legend},googlePlacesID,googlePlacesKey;{template_legend:hide},customTpl;';
$GLOBALS['TL_DCA']['tl_module']['palettes']['reviews'] .= '{protected_legend:hide},protected;{expert_legend:hide},guests;{invisible_legend:hide},invisible,start,stop';
*/

/**

 * Add fields to tl_module

 */
/*$GLOBALS['TL_DCA']['tl_module']['fields']['reviews'] = array(

    'label' => &$GLOBALS['TL_LANG']['tl_module']['reviews'],
    'exclude' => true,
    'sorting' => true,
    'flag' => 1,
    'search' => true,
    'inputType' => 'text',
    'eval' => array('mandatory' => true, 'maxlength' => 3),
    'sql' => "varchar(3) NOT NULL default ''",

);*/