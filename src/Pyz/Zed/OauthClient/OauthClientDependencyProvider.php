<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\OauthClient;

use Spryker\Zed\MessageBroker\Communication\Plugin\OauthClient\TenantIdentifierAccessTokenRequestExpanderPlugin;
use Spryker\Zed\OauthAuth0\Communication\Plugin\OauthClient\Auth0OauthAccessTokenProviderPlugin;
use Spryker\Zed\OauthAuth0\Communication\Plugin\OauthClient\CacheKeySeedAccessTokenRequestExpanderPlugin;
use Spryker\Zed\OauthClient\OauthClientDependencyProvider as SprykerOauthClientDependencyProvider;

class OauthClientDependencyProvider extends SprykerOauthClientDependencyProvider
{
    /**
     * @return array<\Spryker\Zed\OauthClientExtension\Dependency\Plugin\OauthAccessTokenProviderPluginInterface>
     */
    protected function getOauthAccessTokenProviderPlugins(): array
    {
        return [
            new Auth0OauthAccessTokenProviderPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\OauthClientExtension\Dependency\Plugin\AccessTokenRequestExpanderPluginInterface>
     */
    protected function getAccessTokenRequestExpanderPlugins(): array
    {
        return [
            new CacheKeySeedAccessTokenRequestExpanderPlugin(),
            new TenantIdentifierAccessTokenRequestExpanderPlugin(),
        ];
    }
}
