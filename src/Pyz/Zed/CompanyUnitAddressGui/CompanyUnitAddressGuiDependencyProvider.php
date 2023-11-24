<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CompanyUnitAddressGui;

use Spryker\Zed\CompanyGui\Communication\Plugin\CompanyUnitAddressGui\CompanyToCompanyUnitAddressEditFormExpanderPlugin;
use Spryker\Zed\CompanyUnitAddressGui\CompanyUnitAddressGuiDependencyProvider as SprykerCompanyUnitAddressGuiDependencyProvider;
use Spryker\Zed\CompanyUnitAddressLabel\Communication\Plugin\CompanyUnitAddressEditFormExpanderPlugin;
use Spryker\Zed\CompanyUnitAddressLabelGui\Communication\Plugin\CompanyUnitAddressTableExpanderPlugin;

class CompanyUnitAddressGuiDependencyProvider extends SprykerCompanyUnitAddressGuiDependencyProvider
{
    /**
     * @return array<\Spryker\Zed\CompanyUnitAddressGuiExtension\Dependency\Plugin\CompanyUnitAddressEditFormExpanderPluginInterface>
     */
    protected function getCompanyUnitAddressFormPlugins(): array
    {
        return [
            new CompanyUnitAddressEditFormExpanderPlugin(), new CompanyToCompanyUnitAddressEditFormExpanderPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\CompanyUnitAddressGuiExtension\Dependency\Plugin\CompanyUnitAddressTableConfigExpanderPluginInterface>
     */
    protected function getCompanyUnitAddressTableConfigExpanderPlugins(): array
    {
        return [
            new CompanyUnitAddressTableExpanderPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\CompanyUnitAddressGuiExtension\Dependency\Plugin\CompanyUnitAddressTableHeaderExpanderPluginInterface>
     */
    protected function getCompanyUnitAddressTableHeaderExpanderPlugins(): array
    {
        return [
            new CompanyUnitAddressTableExpanderPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\CompanyUnitAddressGuiExtension\Dependency\Plugin\CompanyUnitAddressTableDataExpanderPluginInterface>
     */
    protected function getCompanyUnitAddressTableDataExpanderPlugins(): array
    {
        return [
            new CompanyUnitAddressTableExpanderPlugin(),
        ];
    }
}
