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

class AddonPropertiesResourceGetAddonPropertyGet extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $addonKey;
    protected $propertyKey;

    /**
     * Returns the key and value of an app's property.
     *
     **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
     * Additionally, Forge apps published on the Marketplace can access properties of Connect apps they were [migrated from](https://developer.atlassian.com/platform/forge/build-a-connect-on-forge-app/).
     *
     * @param string $addonKey    the key of the app, as defined in its descriptor
     * @param string $propertyKey the key of the property
     */
    public function __construct(string $addonKey, string $propertyKey)
    {
        $this->addonKey = $addonKey;
        $this->propertyKey = $propertyKey;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{addonKey}', '{propertyKey}'], [$this->addonKey, $this->propertyKey], '/rest/atlassian-connect/1/addons/{addonKey}/properties/{propertyKey}');
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
     * @return \JiraSdk\Api\Model\EntityProperty|null
     *
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceGetAddonPropertyGetBadRequestException
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceGetAddonPropertyGetUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceGetAddonPropertyGetNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\EntityProperty', 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AddonPropertiesResourceGetAddonPropertyGetBadRequestException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\OperationMessage', 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AddonPropertiesResourceGetAddonPropertyGetUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\OperationMessage', 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AddonPropertiesResourceGetAddonPropertyGetNotFoundException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\OperationMessage', 'json'), $response);
        }
    }
}
