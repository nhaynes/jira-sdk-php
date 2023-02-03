<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk;

use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Message\Authentication\Bearer;
use Psr\Http\Client\ClientInterface;

class ClientFactory
{
    public static function create(string $sitename, string $token, ClientInterface $httpClient = null): Client
    {
        if (null === $httpClient) {
            $httpClient = Psr18ClientDiscovery::find();
        }

        $uri = Psr17FactoryDiscovery::findUriFactory()->createUri("https://{$sitename}.atlassian.net");
        $authentication = new Bearer($token);
        $pluginClient = new PluginClient($httpClient, [
            new ErrorPlugin(),
            new AuthenticationPlugin($authentication),
        ]);

        return Client::create($pluginClient);
    }
}
