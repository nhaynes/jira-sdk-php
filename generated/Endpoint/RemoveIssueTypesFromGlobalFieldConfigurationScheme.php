<?php

namespace JiraSdk\Endpoint;

class RemoveIssueTypesFromGlobalFieldConfigurationScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Removes issue types from the field configuration scheme.

    This operation can only modify field configuration schemes used in company-managed (classic) projects.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the field configuration scheme.
    * @param \JiraSdk\Model\IssueTypeIdsToRemove $requestBody
    */
    public function __construct(int $id, \JiraSdk\Model\IssueTypeIdsToRemove $requestBody)
    {
        $this->id = $id;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/fieldconfigurationscheme/{id}/mapping/delete');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\IssueTypeIdsToRemove) {
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
     * @throws \JiraSdk\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeBadRequestException
     * @throws \JiraSdk\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeForbiddenException
     * @throws \JiraSdk\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeNotFoundException
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
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeForbiddenException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeNotFoundException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}