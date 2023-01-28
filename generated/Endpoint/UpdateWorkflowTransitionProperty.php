<?php

namespace JiraSdk\Endpoint;

class UpdateWorkflowTransitionProperty extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $transitionId;
    /**
     * Updates a workflow transition by changing the property value. Trying to update a property that does not exist results in a new property being added to the transition. Transition properties are used to change the behavior of a transition. For more information, see [Transition properties](https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties) and [Workflow properties](https://confluence.atlassian.com/x/JYlKLg).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $transitionId The ID of the transition. To get the ID, view the workflow in text mode in the Jira admin settings. The ID is shown next to the transition.
     * @param \JiraSdk\Model\WorkflowTransitionProperty $requestBody
     * @param array $queryParameters {
     *     @var string $key The key of the property being updated, also known as the name of the property. Set this to the same value as the `key` defined in the request body.
     *     @var string $workflowName The name of the workflow that the transition belongs to.
     *     @var string $workflowMode The workflow status. Set to `live` for inactive workflows or `draft` for draft workflows. Active workflows cannot be edited.
     * }
     */
    public function __construct(int $transitionId, \JiraSdk\Model\WorkflowTransitionProperty $requestBody, array $queryParameters = array())
    {
        $this->transitionId = $transitionId;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{transitionId}'), array($this->transitionId), '/rest/api/3/workflow/transitions/{transitionId}/properties');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\WorkflowTransitionProperty) {
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
     * @throws \JiraSdk\Exception\UpdateWorkflowTransitionPropertyBadRequestException
     * @throws \JiraSdk\Exception\UpdateWorkflowTransitionPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateWorkflowTransitionPropertyForbiddenException
     * @throws \JiraSdk\Exception\UpdateWorkflowTransitionPropertyNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowTransitionProperty
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\WorkflowTransitionProperty', 'json');
        }
        if (304 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\UpdateWorkflowTransitionPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateWorkflowTransitionPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateWorkflowTransitionPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateWorkflowTransitionPropertyNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}