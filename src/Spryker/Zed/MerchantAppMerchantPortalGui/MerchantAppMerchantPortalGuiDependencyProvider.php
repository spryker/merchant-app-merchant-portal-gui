<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\MerchantAppMerchantPortalGui;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\MerchantAppMerchantPortalGui\Dependency\Facade\MerchantAppMerchantPortalGuiToMerchantAppFacadeBridge;
use Spryker\Zed\MerchantAppMerchantPortalGui\Dependency\Facade\MerchantAppMerchantPortalGuiToMerchantUserFacadeBridge;

/**
 * @method \Spryker\Zed\MerchantAppMerchantPortalGui\MerchantAppMerchantPortalGuiConfig getConfig()
 */
class MerchantAppMerchantPortalGuiDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_MERCHANT_APP = 'FACADE_MERCHANT_APP';

    /**
     * @var string
     */
    public const FACADE_MERCHANT_USER = 'FACADE_MERCHANT_USER';

    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = $this->addMerchantAppFacade($container);
        $container = $this->addMerchantUserFacade($container);

        return $container;
    }

    protected function addMerchantAppFacade(Container $container): Container
    {
        $container->set(static::FACADE_MERCHANT_APP, function () use ($container) {
            return new MerchantAppMerchantPortalGuiToMerchantAppFacadeBridge($container->getLocator()->merchantApp()->facade());
        });

        return $container;
    }

    protected function addMerchantUserFacade(Container $container): Container
    {
        $container->set(static::FACADE_MERCHANT_USER, function () use ($container) {
            return new MerchantAppMerchantPortalGuiToMerchantUserFacadeBridge($container->getLocator()->merchantUser()->facade());
        });

        return $container;
    }
}
