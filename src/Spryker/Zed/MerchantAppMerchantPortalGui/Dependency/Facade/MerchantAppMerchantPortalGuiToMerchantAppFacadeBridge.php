<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\MerchantAppMerchantPortalGui\Dependency\Facade;

use Generated\Shared\Transfer\MerchantAppOnboardingCollectionTransfer;
use Generated\Shared\Transfer\MerchantAppOnboardingCriteriaTransfer;
use Generated\Shared\Transfer\MerchantAppOnboardingInitializationRequestTransfer;
use Generated\Shared\Transfer\MerchantAppOnboardingInitializationResponseTransfer;

class MerchantAppMerchantPortalGuiToMerchantAppFacadeBridge implements MerchantAppMerchantPortalGuiToMerchantAppFacadeInterface
{
    /**
     * @var \Spryker\Zed\MerchantApp\Business\MerchantAppFacadeInterface
     */
    protected $merchantAppFacade;

    /**
     * @param \Spryker\Zed\MerchantApp\Business\MerchantAppFacadeInterface $merchantAppFacade
     */
    public function __construct($merchantAppFacade)
    {
        $this->merchantAppFacade = $merchantAppFacade;
    }

    public function getMerchantAppOnboardingCollection(
        MerchantAppOnboardingCriteriaTransfer $merchantAppOnboardingCriteriaTransfer
    ): MerchantAppOnboardingCollectionTransfer {
        return $this->merchantAppFacade->getMerchantAppOnboardingCollection($merchantAppOnboardingCriteriaTransfer);
    }

    public function initializeMerchantAppOnboarding(
        MerchantAppOnboardingInitializationRequestTransfer $merchantAppOnboardingInitializationRequestTransfer
    ): MerchantAppOnboardingInitializationResponseTransfer {
        return $this->merchantAppFacade->initializeMerchantAppOnboarding($merchantAppOnboardingInitializationRequestTransfer);
    }
}
