<?php

namespace JiraSdk\Endpoint;

class DeleteDraftWorkflowMapping extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Deletes the workflow-issue type mapping for a workflow in a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param array $queryParameters {
     *     @var string $workflowName The name of the workflow.
     * }
     */
    public function __construct(int $id, array $queryParameters = array())
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/workflowscheme/{id}/draft/workflow');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
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
     * @throws \JiraSdk\Exception\DeleteDraftWorkflowMappingUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteDraftWorkflowMappingForbiddenException
     * @throws \JiraSdk\Exception\DeleteDraftWorkflowMappingNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteDraftWorkflowMappingUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteDraftWorkflowMappingForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteDraftWorkflowMappingNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
