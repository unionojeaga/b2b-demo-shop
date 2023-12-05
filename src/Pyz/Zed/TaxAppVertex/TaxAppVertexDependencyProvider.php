<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\TaxAppVertex;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;

use Spryker\Zed\MerchantProfile\Communication\Plugin\TaxApp\MerchantProfileAddressCalculableObjectTaxAppExpanderPlugin;
use Spryker\Zed\MerchantProfile\Communication\Plugin\TaxApp\MerchantProfileAddressOrderTaxAppExpanderPlugin;
use Spryker\Zed\ProductOfferAvailability\Communication\Plugin\TaxApp\ProductOfferAvailabilityCalculableObjectTaxAppExpanderPlugin;
use Spryker\Zed\ProductOfferAvailability\Communication\Plugin\TaxApp\ProductOfferAvailabilityOrderTaxAppExpanderPlugin;

class TaxAppVertexDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @return array<\Spryker\Zed\TaxAppExtension\Dependency\Plugin\CalculableObjectTaxAppExpanderPluginInterface>
     */
    protected function getCalculableObjectExpanderPluginCollection(): array
    {
        return [
            # This plugin stack is responsible for expansion of CalculableObjectTransfer based on present fields. Add your custom implemented expander plugins here following the example in `spryker/tax-app-vertex` module.

            // The following plugins are for Marketplace only.
            # This plugin is expanding CalculableObjectTransfer object with merchant address information.
            new MerchantProfileAddressCalculableObjectTaxAppExpanderPlugin(),
            # This plugin is expanding CalculableObjectTransfer object with product offer availability information.
            new ProductOfferAvailabilityCalculableObjectTaxAppExpanderPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\TaxAppExtension\Dependency\Plugin\OrderTaxAppExpanderPluginInterface>
     */
    protected function getOrderExpanderPluginCollection(): array
    {
        return [
            # This plugin stack is responsible for expansion of OrderTransfer based on present fields. Add your custom implemented expander plugins here following the example in `spryker/tax-app-vertex` module.

            // The following plugins are for Marketplace only.
            # This plugin is expanding OrderTransfer object with merchant address information.
            new MerchantProfileAddressOrderTaxAppExpanderPlugin(),
            # This plugin is expanding OrderTransfer object with product offer availability information.
            new ProductOfferAvailabilityOrderTaxAppExpanderPlugin(),
        ];
    }
}
