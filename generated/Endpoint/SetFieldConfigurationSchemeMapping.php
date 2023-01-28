<?php

namespace JiraSdk\Endpoint;

class SetFieldConfigurationSchemeMapping extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Assigns issue types to field configurations on field configuration scheme.

    This operation can only modify field configuration schemes used in company-managed (classic) projects.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the field configuration scheme.
    * @param \JiraSdk\Model\AssociateFieldConfigurationsWithIssueTypesRequest $requestBody
    */
    public function __construct(int $id, \JiraSdk\Model\AssociateFieldConfigurationsWithIssueTypesRequest $requestBody)
    {
        $this->id = $id;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/fieldconfigurationscheme/{id}/mapping');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\AssociateFieldConfigurationsWithIssueTypesRequest) {
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
     * @throws \JiraSdk\Exception\SetFieldConfigurationSchemeMappingBadRequestException
     * @throws \JiraSdk\Exception\SetFieldConfigurationSchemeMappingUnauthorizedException
     * @throws \JiraSdk\Exception\SetFieldConfigurationSchemeMappingForbiddenException
     * @throws \JiraSdk\Exception\SetFieldConfigurationSchemeMappingNotFoundException
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
            throw new \JiraSdk\Exception\SetFieldConfigurationSchemeMappingBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SetFieldConfigurationSchemeMappingUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\SetFieldConfigurationSchemeMappingForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\SetFieldConfigurationSchemeMappingNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
