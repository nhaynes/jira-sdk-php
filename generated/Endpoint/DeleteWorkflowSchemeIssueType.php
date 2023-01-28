<?php

namespace JiraSdk\Endpoint;

class DeleteWorkflowSchemeIssueType extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    protected $issueType;
    /**
    * Deletes the issue type-workflow mapping for an issue type in a workflow scheme.

    Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the issue type-workflow mapping deleted. The draft workflow scheme can be published in Jira.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the workflow scheme.
    * @param string $issueType The ID of the issue type.
    * @param array $queryParameters {
    *     @var bool $updateDraftIfNeeded Set to true to create or update the draft of a workflow scheme and update the mapping in the draft, when the workflow scheme cannot be edited. Defaults to `false`.
    * }
    */
    public function __construct(int $id, string $issueType, array $queryParameters = array())
    {
        $this->id = $id;
        $this->issueType = $issueType;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}', '{issueType}'), array($this->id, $this->issueType), '/rest/api/3/workflowscheme/{id}/issuetype/{issueType}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('updateDraftIfNeeded'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('updateDraftIfNeeded', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeIssueTypeBadRequestException
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeIssueTypeForbiddenException
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeIssueTypeNotFoundException
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
            throw new \JiraSdk\Exception\DeleteWorkflowSchemeIssueTypeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowSchemeIssueTypeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowSchemeIssueTypeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowSchemeIssueTypeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
