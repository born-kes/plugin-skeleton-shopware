<?php declare(strict_types=1);

namespace Kes\PluginSkeletonShopware\Storefront\Controller;

use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Shopware\Core\System\SystemConfig\SystemConfigService;

/**
 * @Route(defaults={"_routeScope"={"storefront"}})
 */
class JobController extends StorefrontController
{
    private SystemConfigService $systemConfigService;

    public function __construct(SystemConfigService  $systemConfigService)
    {
        $this->systemConfigService = $systemConfigService;
    }

    /**
    * @Route("/jobs", name="frontend.jobs", methods={"GET"})
    */
    public function showJobs(): Response
    {
        $textFiledConfig = $this->systemConfigService->get('PluginSkeletonShopware.config.demoTextField');

        return $this->renderStorefront('@PluginSkeletonShopware/storefront/page/jobs.html.twig', [
            'TextFiledConfig' => $textFiledConfig
        ]);
    }
}