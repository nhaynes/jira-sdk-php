<?php

namespace JiraSdk\Endpoint;

class GetWorkflowTransitionProperties extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $transitionId;
    /**
     * Returns the properties on a workflow transition. Transition properties are used to change the behavior of a transition. For more information, see [Transition properties](https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties) and [Workflow properties](https://confluence.atlassian.com/x/JYlKLg).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $transitionId The ID of the transition. To get the ID, view the workflow in text mode in the Jira administration console. The ID is shown next to the transition.
     * @param array $queryParameters {
     *     @var bool $includeReservedKeys Some properties with keys that have the *jira.* prefix are reserved, which means they are not editable. To include these properties in the results, set this parameter to *true*.
     *     @var string $key The key of the property being returned, also known as the name of the property. If this parameter is not specified, all properties on the transition are returned.
     *     @var string $workflowName The name of the workflow that the transition belongs to.
     *     @var string $workflowMode The workflow status. Set to *live* for active and inactive workflows, or *draft* for draft workflows.
     * }
     */
    public function __construct(int $transitionId, array $queryParameters = array())
    {
        $this->transitionId = $transitionId;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{transitionId}'), array($this->transitionId), '/rest/api/3/workflow/transitions/{transitionId}/properties');
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
        $optionsResolver->setDefined(array('includeReservedKeys', 'key', 'workflowName', 'workflowMode'));
        $optionsResolver->setRequired(array('workflowName'));
        $optionsResolver->setDefaults(array('includeReservedKeys' => false, 'workflowMode' => 'live'));
        $optionsResolver->addAllowedTypes('includeReservedKeys', array('bool'));
        $optionsResolver->addAllowedTypes('key', array('string'));
        $optionsResolver->addAllowedTypes('workflowName', array('string'));
        $optionsResolver->addAllowedTypes('workflowMode', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetWorkflowTransitionPropertiesBadRequestException
     * @throws \JiraSdk\Exception\GetWorkflowTransitionPropertiesUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorkflowTransitionPropertiesForbiddenException
     * @throws \JiraSdk\Exception\GetWorkflowTransitionPropertiesNotFoundException
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
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowTransitionPropertiesBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowTransitionPropertiesUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowTransitionPropertiesForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowTransitionPropertiesNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
