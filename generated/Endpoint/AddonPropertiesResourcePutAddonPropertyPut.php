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

class AddonPropertiesResourcePutAddonPropertyPut extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $addonKey;
    protected $propertyKey;

    /**
     * Sets the value of an app's property. Use this resource to store custom data for your app.
     *
     * The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
     *
     **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
     *
     * @param string $addonKey    the key of the app, as defined in its descriptor
     * @param string $propertyKey the key of the property
     * @param mixed  $requestBody
     */
    public function __construct(string $addonKey, string $propertyKey, $requestBody)
    {
        $this->addonKey = $addonKey;
        $this->propertyKey = $propertyKey;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{addonKey}', '{propertyKey}'], [$this->addonKey, $this->propertyKey], '/rest/atlassian-connect/1/addons/{addonKey}/properties/{propertyKey}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (isset($this->body)) {
            return [['Content-Type' => ['application/json']], json_encode($this->body)];
        }

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
     * @return \JiraSdk\Api\Model\OperationMessage|null
     *
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourcePutAddonPropertyPutBadRequestException
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourcePutAddonPropertyPutUnauthorizedException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\OperationMessage', 'json');
        }
        if ((null === $contentType) === false && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\OperationMessage', 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AddonPropertiesResourcePutAddonPropertyPutBadRequestException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\OperationMessage', 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\AddonPropertiesResourcePutAddonPropertyPutUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\OperationMessage', 'json'), $response);
        }
    }
}
