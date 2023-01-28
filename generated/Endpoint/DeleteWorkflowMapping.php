<?php

namespace JiraSdk\Endpoint;

class DeleteWorkflowMapping extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Deletes the workflow-issue type mapping for a workflow in a workflow scheme.

    Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the workflow-issue type mapping deleted. The draft workflow scheme can be published in Jira.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the workflow scheme.
    * @param array $queryParameters {
    *     @var string $workflowName The name of the workflow.
    *     @var bool $updateDraftIfNeeded Set to true to create or update the draft of a workflow scheme and delete the mapping from the draft, when the workflow scheme cannot be edited. Defaults to `false`.
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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/workflowscheme/{id}/workflow');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('workflowName', 'updateDraftIfNeeded'));
        $optionsResolver->setRequired(array('workflowName'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('workflowName', array('string'));
        $optionsResolver->addAllowedTypes('updateDraftIfNeeded', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteWorkflowMappingBadRequestException
     * @throws \JiraSdk\Exception\DeleteWorkflowMappingUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteWorkflowMappingForbiddenException
     * @throws \JiraSdk\Exception\DeleteWorkflowMappingNotFoundException
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
        if (400 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowMappingBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowMappingUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowMappingForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowMappingNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
