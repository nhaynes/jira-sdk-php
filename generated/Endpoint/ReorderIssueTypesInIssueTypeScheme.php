<?php

namespace JiraSdk\Endpoint;

class ReorderIssueTypesInIssueTypeScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueTypeSchemeId;
    /**
    * Changes the order of issue types in an issue type scheme.

    The request body parameters must meet the following requirements:

    *  all of the issue types must belong to the issue type scheme.
    *  either `after` or `position` must be provided.
    *  the issue type in `after` must not be in the issue type list.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $issueTypeSchemeId The ID of the issue type scheme.
    * @param \JiraSdk\Model\OrderOfIssueTypes $requestBody
    */
    public function __construct(int $issueTypeSchemeId, \JiraSdk\Model\OrderOfIssueTypes $requestBody)
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
        return str_replace(array('{issueTypeSchemeId}'), array($this->issueTypeSchemeId), '/rest/api/3/issuetypescheme/{issueTypeSchemeId}/issuetype/move');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\OrderOfIssueTypes) {
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
     * @throws \JiraSdk\Exception\ReorderIssueTypesInIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Exception\ReorderIssueTypesInIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\ReorderIssueTypesInIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Exception\ReorderIssueTypesInIssueTypeSchemeNotFoundException
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
            throw new \JiraSdk\Exception\ReorderIssueTypesInIssueTypeSchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\ReorderIssueTypesInIssueTypeSchemeUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\ReorderIssueTypesInIssueTypeSchemeForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\ReorderIssueTypesInIssueTypeSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
