<?php

namespace JiraSdk\Endpoint;

class DeleteWorkflowTransitionProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $transitionId;
    /**
     * Deletes a property from a workflow transition. Transition properties are used to change the behavior of a transition. For more information, see [Transition properties](https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties) and [Workflow properties](https://confluence.atlassian.com/x/JYlKLg).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $transitionId The ID of the transition. To get the ID, view the workflow in text mode in the Jira admin settings. The ID is shown next to the transition.
     * @param array $queryParameters {
     *     @var string $key The name of the transition property to delete, also known as the name of the property.
     *     @var string $workflowName The name of the workflow that the transition belongs to.
     *     @var string $workflowMode The workflow status. Set to `live` for inactive workflows or `draft` for draft workflows. Active workflows cannot be edited.
     * }
     */
    public function __construct(int $transitionId, array $queryParameters = array())
    {
        $this->transitionId = $transitionId;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{transitionId}'), array($this->transitionId), '/rest/api/3/workflow/transitions/{transitionId}/properties');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('key', 'workflowName', 'workflowMode'));
        $optionsResolver->setRequired(array('key', 'workflowName'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('key', array('string'));
        $optionsResolver->addAllowedTypes('workflowName', array('string'));
        $optionsResolver->addAllowedTypes('workflowMode', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteWorkflowTransitionPropertyBadRequestException
     * @throws \JiraSdk\Exception\DeleteWorkflowTransitionPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteWorkflowTransitionPropertyForbiddenException
     * @throws \JiraSdk\Exception\DeleteWorkflowTransitionPropertyNotFoundException
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
        if (304 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowTransitionPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowTransitionPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowTransitionPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteWorkflowTransitionPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
