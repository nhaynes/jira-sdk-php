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

class AddonPropertiesResourceDeleteAddonPropertyDelete extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $addonKey;
    protected $propertyKey;

    /**
     * Deletes an app's property.
     **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
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
        return 'DELETE';
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
        return [];
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteBadRequestException
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteBadRequestException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\OperationMessage', 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\OperationMessage', 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteNotFoundException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\OperationMessage', 'json'), $response);
        }
    }
}
