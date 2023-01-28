<?php

namespace JiraSdk\Endpoint;

class GetDraftWorkflow extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Returns the workflow-issue type mappings for a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param array $queryParameters {
     *     @var string $workflowName The name of a workflow in the scheme. Limits the results to the workflow-issue type mapping for the specified workflow.
     * }
     */
    public function __construct(int $id, array $queryParameters = array())
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/workflowscheme/{id}/draft/workflow');
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
        $optionsResolver->setDefined(array('workflowName'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('workflowName', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetDraftWorkflowUnauthorizedException
     * @throws \JiraSdk\Exception\GetDraftWorkflowForbiddenException
     * @throws \JiraSdk\Exception\GetDraftWorkflowNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueTypesWorkflowMapping
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssueTypesWorkflowMapping', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetDraftWorkflowUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetDraftWorkflowForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetDraftWorkflowNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
