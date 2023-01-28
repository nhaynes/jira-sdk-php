<?php

namespace JiraSdk\Endpoint;

class AddonPropertiesResourcePutAddonPropertyPut extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $addonKey;
    protected $propertyKey;
    /**
    * Sets the value of an app's property. Use this resource to store custom data for your app.

    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.

    **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
    *
    * @param string $addonKey The key of the app, as defined in its descriptor.
    * @param string $propertyKey The key of the property.
    * @param mixed $requestBody
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
        return str_replace(array('{addonKey}', '{propertyKey}'), array($this->addonKey, $this->propertyKey), '/rest/atlassian-connect/1/addons/{addonKey}/properties/{propertyKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (isset($this->body)) {
            return array(array('Content-Type' => array('application/json')), json_encode($this->body));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\AddonPropertiesResourcePutAddonPropertyPutBadRequestException
     * @throws \JiraSdk\Exception\AddonPropertiesResourcePutAddonPropertyPutUnauthorizedException
     *
     * @return null|\JiraSdk\Model\OperationMessage
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\OperationMessage', 'json');
        }
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\OperationMessage', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddonPropertiesResourcePutAddonPropertyPutBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\OperationMessage', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddonPropertiesResourcePutAddonPropertyPutUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\OperationMessage', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array();
    }
}
