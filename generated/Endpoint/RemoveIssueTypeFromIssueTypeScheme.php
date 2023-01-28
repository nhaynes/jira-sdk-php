<?php

namespace JiraSdk\Endpoint;

class RemoveIssueTypeFromIssueTypeScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueTypeSchemeId;
    protected $issueTypeId;
    /**
    * Removes an issue type from an issue type scheme.

    This operation cannot remove:

    *  any issue type used by issues.
    *  any issue types from the default issue type scheme.
    *  the last standard issue type from an issue type scheme.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $issueTypeSchemeId The ID of the issue type scheme.
    * @param int $issueTypeId The ID of the issue type.
    */
    public function __construct(int $issueTypeSchemeId, int $issueTypeId)
    {
        $this->issueTypeSchemeId = $issueTypeSchemeId;
        $this->issueTypeId = $issueTypeId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueTypeSchemeId}', '{issueTypeId}'), array($this->issueTypeSchemeId, $this->issueTypeId), '/rest/api/3/issuetypescheme/{issueTypeSchemeId}/issuetype/{issueTypeId}');
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
     * @throws \JiraSdk\Exception\RemoveIssueTypeFromIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Exception\RemoveIssueTypeFromIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\RemoveIssueTypeFromIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Exception\RemoveIssueTypeFromIssueTypeSchemeNotFoundException
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
            throw new \JiraSdk\Exception\RemoveIssueTypeFromIssueTypeSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\RemoveIssueTypeFromIssueTypeSchemeUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\RemoveIssueTypeFromIssueTypeSchemeForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\RemoveIssueTypeFromIssueTypeSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
