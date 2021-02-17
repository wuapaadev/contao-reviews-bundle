<?php

namespace Wuapaa\ContaoReviewsBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Contao\Database;
/**
 * @ContentElement(
 *  "reviews",category="texts",template="ce_reviews",renderer="forward")
 */
class ContaoReviewsContentElementController extends AbstractContentElementController
{
    public const TYPE = 'ce_reviews';

    protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {
        $sql = "SELECT * FROM tl_wuapaa_reviews_elements WHERE pid =?";
        $result = Database::getInstance()->prepare($sql)->execute($model->__get('reviews'));
        $star="";
        $data = json_decode($result->placesresult)->result->rating;
        $reviews = json_decode($result->placesresult)->result->reviews;
        $rcount = count($reviews);
        $starstmpl = '<span class="review-star">*</span>';
        for ($i = 0; $i < number_format($data, 1); $i++) {
            $star .= $starstmpl;
        }
        $template->rating = $data;
        $template->star = $star;

        $template->reviews = $reviews;
        return $template->getResponse();
    }
}