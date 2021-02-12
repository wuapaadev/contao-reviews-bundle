<?php

declare(strict_types=1);

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Wuapaa\ContaoReviewsBundle\Cron;
use Contao\System;

class ContaoReviewsGoogleMapsApiCron extends \Contao\System
{
    public function __construct()
    {
        $this->import('Database');
    }
    public function getContent()
    {
        $places = $this->Database->prepare("SELECT * FROM `tl_wuapaa_reviews` WHERE `type` = 'gm'")->execute();
        while ($places->next()) {
            $id = $places->apiID;
            $key = $places->apiKey;

            $ch = curl_init("https://maps.googleapis.com/maps/api/place/details/json?language=de&placeid=" . $id . "&key=" . $key . "&fields=review,rating");
            $curl_data = array("placeid" => $id, "key" => $key);
            $curlopt_array = array(CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => 0,
                CURLOPT_VERBOSE => 0);
            curl_setopt_array($ch, $curlopt_array);
            $content = curl_exec($ch);
            curl_close($ch);
            $set = array('tstamp' => time(),'pid' =>$places->id, 'placesID' => $id, 'placesresult' => $content);

            $query = $this->Database->prepare("UPDATE tl_wuapaa_reviews_elements %s WHERE placesID=?")->set($set)->execute($id);
            if ($query->affectedRows == 0) {
                $query = $this->Database->prepare("INSERT INTO tl_wuapaa_reviews_elements %s")->set($set)->execute();
            }
            $this::log('GooglePlaces Update called', __METHOD__, TL_CRON);
        }
    }
}