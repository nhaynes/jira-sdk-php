<?php

namespace JiraSdk\Endpoint;

class AddIssueTypesToContext extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldId;
    protected $contextId;
    /**
    * Adds issue types to a custom field context, appending the issue types to the issue types list.

    A custom field context without any issue types applies to all issue types. Adding issue types to such a custom field context would result in it applying to only the listed issue types.

    If any of the issue types exists in the custom field context, the operation fails and no issue types are added.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context.
    * @param \JiraSdk\Model\IssueTypeIds $requestBody
    */
    public function __construct(string $fieldId, int $contextId, \JiraSdk\Model\IssueTypeIds $requestBody)
    {
        $this->fieldId = $fieldId;
        $this->contextId = $contextId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldId}', '{contextId}'), array($this->fieldId, $this->contextId), '/rest/api/3/field/{fieldId}/context/{contextId}/issuetype');
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
     * @throws \JiraSdk\Exception\AddIssueTypesToContextBadRequestException
     * @throws \JiraSdk\Exception\AddIssueTypesToContextUnauthorizedException
     * @throws \JiraSdk\Exception\AddIssueTypesToContextForbiddenException
     * @throws \JiraSdk\Exception\AddIssueTypesToContextNotFoundException
     * @throws \JiraSdk\Exception\AddIssueTypesToContextConflictException
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
            throw new \JiraSdk\Exception\AddIssueTypesToContextBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AddIssueTypesToContextUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddIssueTypesToContextForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddIssueTypesToContextNotFoundException($response);
        }
        if (is_null($contentType) === false && (409 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AddIssueTypesToContextConflictException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
