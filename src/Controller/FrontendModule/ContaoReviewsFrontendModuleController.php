<?php

namespace Wuapaa\ContaoReviewsBundle\Controller\FrontendModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;

use Contao\CoreBundle\ServiceAnnotation\FrontendModule;
use Contao\ModuleModel;
use Contao\PageModel;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @FrontendModule(
 *  ContaoReviewsFrontendModuleController::TYPE,
 *  category="miscellaneous",
 *  template = "mod_contao_review",
 *  method = "getResponse"
 * )
 */
class ContaoReviewsFrontendModuleController extends AbstractFrontendModuleController
{
    public const TYPE = 'reviews';

    protected function getResponse(Template $template, ModuleModel $model, Request $request): ?Response
    {
        

        return $template->getResponse();
    }
}