<?php

namespace JiraSdk\Endpoint;

class DynamicModulesResourceRegisterModulesPost extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Registers a list of modules.
     **[Permissions](#permissions) required:** Only Connect apps can make this request.
     *
     * @param \JiraSdk\Model\ConnectModules $requestBody
     */
    public function __construct(\JiraSdk\Model\ConnectModules $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/atlassian-connect/1/app/module/dynamic';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\ConnectModules) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
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
     * @throws \JiraSdk\Exception\DynamicModulesResourceRegisterModulesPostBadRequestException
     * @throws \JiraSdk\Exception\DynamicModulesResourceRegisterModulesPostUnauthorizedException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DynamicModulesResourceRegisterModulesPostBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorMessage', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DynamicModulesResourceRegisterModulesPostUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorMessage', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array();
    }
}
