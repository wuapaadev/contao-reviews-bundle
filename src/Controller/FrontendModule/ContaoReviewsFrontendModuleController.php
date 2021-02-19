<?php

namespace Wuapaa\ContaoReviewsBundle\Controller\FrontendModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;

use Contao\CoreBundle\ServiceAnnotation\FrontendModule;
use Contao\ModuleModel;
use Contao\PageModel;
use Contao\Template;
use Contao\Database;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @FrontendModule(
 *  ContaoReviewsFrontendModuleController::TYPE,
 *  category="miscellaneous",
 *  template = "mod_reviews",
 *  
 * )
 */
class ContaoReviewsFrontendModuleController extends AbstractFrontendModuleController
{
    public const TYPE = 'reviews';

   

    
    protected function getResponse(Template $template, ModuleModel $model, Request $request): ?Response
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