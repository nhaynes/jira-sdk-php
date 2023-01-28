<?php

namespace JiraSdk\Endpoint;

class SetWorkflowSchemeIssueType extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    protected $issueType;
    /**
    * Sets the workflow for an issue type in a workflow scheme.

    Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request body and a draft workflow scheme is created or updated with the new issue type-workflow mapping. The draft workflow scheme can be published in Jira.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the workflow scheme.
    * @param string $issueType The ID of the issue type.
    * @param \JiraSdk\Model\IssueTypeWorkflowMapping $requestBody
    */
    public function __construct(int $id, string $issueType, \JiraSdk\Model\IssueTypeWorkflowMapping $requestBody)
    {
        $this->id = $id;
        $this->issueType = $issueType;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}', '{issueType}'), array($this->id, $this->issueType), '/rest/api/3/workflowscheme/{id}/issuetype/{issueType}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\IssueTypeWorkflowMapping) {
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
     * @throws \JiraSdk\Exception\SetWorkflowSchemeIssueTypeBadRequestException
     * @throws \JiraSdk\Exception\SetWorkflowSchemeIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\SetWorkflowSchemeIssueTypeForbiddenException
     * @throws \JiraSdk\Exception\SetWorkflowSchemeIssueTypeNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowScheme
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\WorkflowScheme', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\SetWorkflowSchemeIssueTypeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SetWorkflowSchemeIssueTypeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\SetWorkflowSchemeIssueTypeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\SetWorkflowSchemeIssueTypeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
