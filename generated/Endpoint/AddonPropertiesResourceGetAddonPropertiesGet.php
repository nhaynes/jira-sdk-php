<?php

namespace JiraSdk\Endpoint;

class AddonPropertiesResourceGetAddonPropertiesGet extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $addonKey;
    /**
    * Gets all the properties of an app.

    **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
    Additionally, Forge apps published on the Marketplace can access properties of Connect apps they were [migrated from](https://developer.atlassian.com/platform/forge/build-a-connect-on-forge-app/).
    *
    * @param string $addonKey The key of the app, as defined in its descriptor.
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
        return str_replace(array('{addonKey}'), array($this->addonKey), '/rest/atlassian-connect/1/addons/{addonKey}/properties');
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
     * @throws \JiraSdk\Exception\AddonPropertiesResourceGetAddonPropertiesGetUnauthorizedException
     *
     * @return null|\JiraSdk\Model\PropertyKeys
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PropertyKeys', 'json');
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddonPropertiesResourceGetAddonPropertiesGetUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\OperationMessage', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
