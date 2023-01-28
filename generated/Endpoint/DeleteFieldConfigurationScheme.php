<?php

namespace JiraSdk\Endpoint;

class DeleteFieldConfigurationScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Deletes a field configuration scheme.

    This operation can only delete field configuration schemes used in company-managed (classic) projects.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the field configuration scheme.
    */
    public function __construct(int $id)
    {
        $this->id = $id;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/fieldconfigurationscheme/{id}');
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
     * @throws \JiraSdk\Exception\DeleteFieldConfigurationSchemeBadRequestException
     * @throws \JiraSdk\Exception\DeleteFieldConfigurationSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteFieldConfigurationSchemeForbiddenException
     * @throws \JiraSdk\Exception\DeleteFieldConfigurationSchemeNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (204 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\DeleteFieldConfigurationSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteFieldConfigurationSchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteFieldConfigurationSchemeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteFieldConfigurationSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
