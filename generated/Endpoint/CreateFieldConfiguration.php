<?php

namespace JiraSdk\Endpoint;

class CreateFieldConfiguration extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Creates a field configuration. The field configuration is created with the same field properties as the default configuration, with all the fields being optional.

    This operation can only create configurations for use in company-managed (classic) projects.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\FieldConfigurationDetails $requestBody
    */
    public function __construct(\JiraSdk\Model\FieldConfigurationDetails $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/fieldconfiguration';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\FieldConfigurationDetails) {
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
     * @throws \JiraSdk\Exception\CreateFieldConfigurationBadRequestException
     * @throws \JiraSdk\Exception\CreateFieldConfigurationUnauthorizedException
     * @throws \JiraSdk\Exception\CreateFieldConfigurationForbiddenException
     *
     * @return null|\JiraSdk\Model\FieldConfiguration
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\FieldConfiguration', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\CreateFieldConfigurationBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\CreateFieldConfigurationUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\CreateFieldConfigurationForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
