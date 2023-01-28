<?php

namespace JiraSdk\Endpoint;

class DeleteIssueTypeScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueTypeSchemeId;
    /**
    * Deletes an issue type scheme.

    Only issue type schemes used in classic projects can be deleted.

    Any projects assigned to the scheme are reassigned to the default issue type scheme.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $issueTypeSchemeId The ID of the issue type scheme.
    */
    public function __construct(int $issueTypeSchemeId)
    {
        $this->issueTypeSchemeId = $issueTypeSchemeId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueTypeSchemeId}'), array($this->issueTypeSchemeId), '/rest/api/3/issuetypescheme/{issueTypeSchemeId}');
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
     * @throws \JiraSdk\Exception\DeleteIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Exception\DeleteIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Exception\DeleteIssueTypeSchemeNotFoundException
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
            throw new \JiraSdk\Exception\DeleteIssueTypeSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteIssueTypeSchemeUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteIssueTypeSchemeForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteIssueTypeSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
