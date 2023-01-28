<?php

namespace JiraSdk\Endpoint;

class UpdateDraftWorkflowMapping extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Sets the issue types for a workflow in a workflow scheme's draft. The workflow can also be set as the default workflow for the draft workflow scheme. Unmapped issues types are mapped to the default workflow.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param \JiraSdk\Model\IssueTypesWorkflowMapping $requestBody
     * @param array $queryParameters {
     *     @var string $workflowName The name of the workflow.
     * }
     */
    public function __construct(int $id, \JiraSdk\Model\IssueTypesWorkflowMapping $requestBody, array $queryParameters = array())
    {
        $this->id = $id;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/workflowscheme/{id}/draft/workflow');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\IssueTypesWorkflowMapping) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
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
        $optionsResolver->setRequired(array('workflowName'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('workflowName', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\UpdateDraftWorkflowMappingBadRequestException
     * @throws \JiraSdk\Exception\UpdateDraftWorkflowMappingUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateDraftWorkflowMappingForbiddenException
     * @throws \JiraSdk\Exception\UpdateDraftWorkflowMappingNotFoundException
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
            throw new \JiraSdk\Exception\UpdateDraftWorkflowMappingBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateDraftWorkflowMappingUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateDraftWorkflowMappingForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateDraftWorkflowMappingNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
