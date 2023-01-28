<?php

namespace JiraSdk\Endpoint;

class AddIssueTypesToIssueTypeScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueTypeSchemeId;
    /**
    * Adds issue types to an issue type scheme.

    The added issue types are appended to the issue types list.

    If any of the issue types exist in the issue type scheme, the operation fails and no issue types are added.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $issueTypeSchemeId The ID of the issue type scheme.
    * @param \JiraSdk\Model\IssueTypeIds $requestBody
    */
    public function __construct(int $issueTypeSchemeId, \JiraSdk\Model\IssueTypeIds $requestBody)
    {
        $this->issueTypeSchemeId = $issueTypeSchemeId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueTypeSchemeId}'), array($this->issueTypeSchemeId), '/rest/api/3/issuetypescheme/{issueTypeSchemeId}/issuetype');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\IssueTypeIds) {
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
     * @throws \JiraSdk\Exception\AddIssueTypesToIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Exception\AddIssueTypesToIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\AddIssueTypesToIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Exception\AddIssueTypesToIssueTypeSchemeNotFoundException
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
            throw new \JiraSdk\Exception\AddIssueTypesToIssueTypeSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AddIssueTypesToIssueTypeSchemeUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddIssueTypesToIssueTypeSchemeForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddIssueTypesToIssueTypeSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
