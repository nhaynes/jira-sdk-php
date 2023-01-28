<?php

namespace JiraSdk\Endpoint;

class AddonPropertiesResourceDeleteAddonPropertyDelete extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $addonKey;
    protected $propertyKey;
    /**
     * Deletes an app's property.
     **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
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
        return 'DELETE';
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
     * @throws \JiraSdk\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteBadRequestException
     * @throws \JiraSdk\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteUnauthorizedException
     * @throws \JiraSdk\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\OperationMessage', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\OperationMessage', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteNotFoundException($serializer->deserialize($body, 'JiraSdk\\Model\\OperationMessage', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array();
    }
}
