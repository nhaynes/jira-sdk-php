<?php

namespace JiraSdk\Endpoint;

class GetWorkflowSchemeDraftIssueType extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    protected $issueType;
    /**
     * Returns the issue type-workflow mapping for an issue type in a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param string $issueType The ID of the issue type.
     */
    public function __construct(int $id, string $issueType)
    {
        $this->id = $id;
        $this->issueType = $issueType;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}', '{issueType}'), array($this->id, $this->issueType), '/rest/api/3/workflowscheme/{id}/draft/issuetype/{issueType}');
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
     * @throws \JiraSdk\Exception\GetWorkflowSchemeDraftIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeDraftIssueTypeForbiddenException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeDraftIssueTypeNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueTypeWorkflowMapping
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssueTypeWorkflowMapping', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowSchemeDraftIssueTypeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowSchemeDraftIssueTypeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowSchemeDraftIssueTypeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
