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

namespace JiraSdk\Api\Endpoint;

class AddonPropertiesResourceGetAddonPropertiesGet extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $addonKey;

    /**
     * Gets all the properties of an app.
     *
     **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
     * Additionally, Forge apps published on the Marketplace can access properties of Connect apps they were [migrated from](https://developer.atlassian.com/platform/forge/build-a-connect-on-forge-app/).
     *
     * @param string $addonKey the key of the app, as defined in its descriptor
     */
    public function __construct(string $addonKey)
    {
        $this->addonKey = $addonKey;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{addonKey}'], [$this->addonKey], '/rest/atlassian-connect/1/addons/{addonKey}/properties');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\PropertyKeys|null
     *
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceGetAddonPropertiesGetUnauthorizedException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\PropertyKeys', 'json');
        }
        if ((null === $contentType) === false && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AddonPropertiesResourceGetAddonPropertiesGetUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\OperationMessage', 'json'), $response);
        }
    }
}
