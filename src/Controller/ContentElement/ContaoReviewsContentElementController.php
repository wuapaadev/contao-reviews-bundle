<?php

namespace Wuapaa\ContaoReviewsBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ContentElement(
 *  "reviews",category="texts",template="ce_reviews",renderer="forward")
 */
class ContaoReviewsContentElementController extends AbstractContentElementController
{
    public const TYPE = 'ce_reviews';

    protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {
        $template->text = $model->text;
        
        return $template->getResponse();
    }
}