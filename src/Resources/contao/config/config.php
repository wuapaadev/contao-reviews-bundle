<?php
/**
 * Add back end modules
 */

array_insert($GLOBALS['BE_MOD']['content'], sizeof($GLOBALS['BE_MOD']['content']), array('wuapaa_reviews' => array
(
    'tables' 	 => array('tl_wuapaa_reviews', 'tl_wuapaa_reviews_elements')
)
));
/**
 * Register Cron-Jobs 
 */
$GLOBALS['TL_CRON']['daily'][] = [\Wuapaa\ContaoReviewsBundle\Cron\ContaoReviewsGoogleMapsApiCron::class, 'getContent'];