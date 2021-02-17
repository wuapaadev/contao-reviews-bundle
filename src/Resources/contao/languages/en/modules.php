<?php


use Wuapaa\ContaoReviewsBundle\Controller\FrontendModule\ContaoReviewsFrontendModuleController;

$GLOBALS['TL_LANG']['FMD'][ContaoReviewsFrontendModuleController::TYPE] = [
    'Reviews', 
    'Display Reviews',
];
$GLOBALS['TL_LANG']['MOD'][ContaoReviewsFrontendModuleController::TYPE] = [
    'Reviews', 
    'Revies from Google and others',
];
$GLOBALS['TL_LANG']['MOD']['wuapaa_reviews'] = [
    'Reviews', 
    'Revies from Google and others',
];
$GLOBALS['TL_LANG']['tl_module']['reviews_title'] = array(
    'Title','Title of Review'
);
$GLOBALS['TL_LANG']['tl_module']['reviews_legend'] = 'Reviews';
$GLOBALS['TL_LANG']['tl_module']['reviews'] = array('Review-archive','Select the review-archive to display');

$GLOBALS['TL_LANG']['tl_wuapaa_reviews']['title_legend'] = 'Title';
$GLOBALS['TL_LANG']['tl_wuapaa_reviews']['type'] = array('Type','Select Type');
$GLOBALS['TL_LANG']['tl_wuapaa_reviews']['type_legend'] = 'Type';
$GLOBALS['TL_LANG']['tl_wuapaa_reviews']['apiID'] = array('Google API ID','Select ID');
$GLOBALS['TL_LANG']['tl_wuapaa_reviews']['apiKey'] = array('Google API Key','Select Key');

$GLOBALS['TL_LANG']['tl_wuapaa_reviews']['protected_legend'] = 'Protected';
$GLOBALS['TL_LANG']['tl_wuapaa_reviews']['protected'] = array('Protected','Visibility only for specific groups');
$GLOBALS['TL_LANG']['tl_wuapaa_reviews']['groups'] = array('Groups','Select Groups');


