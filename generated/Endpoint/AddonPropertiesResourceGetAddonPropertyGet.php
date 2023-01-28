<?php

namespace JiraSdk\Endpoint;

class AddonPropertiesResourceGetAddonPropertyGet extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $addonKey;
    protected $propertyKey;
    /**
    * Returns the key and value of an app's property.

    **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
    Additionally, Forge apps published on the Marketplace can access properties of Connect apps they were [migrated from](https://developer.atlassian.com/platform/forge/build-a-connect-on-forge-app/).
    *
    * @param string $addonKey The key of the app, as defined in its descriptor.
    * @param string $propertyKey The key of the property.
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
        return str_replace(array('{addonKey}', '{propertyKey}'), array($this->addonKey, $this->propertyKey), '/rest/atlassian-connect/1/addons/{addonKey}/properties/{propertyKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\AddonPropertiesResourceGetAddonPropertyGetBadRequestException
     * @throws \JiraSdk\Exception\AddonPropertiesResourceGetAddonPropertyGetUnauthorizedException
     * @throws \JiraSdk\Exception\AddonPropertiesResourceGetAddonPropertyGetNotFoundException
     *
     * @return null|\JiraSdk\Model\EntityProperty
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\EntityProperty', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddonPropertiesResourceGetAddonPropertyGetBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\OperationMessage', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddonPropertiesResourceGetAddonPropertyGetUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\OperationMessage', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddonPropertiesResourceGetAddonPropertyGetNotFoundException($serializer->deserialize($body, 'JiraSdk\\Model\\OperationMessage', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
