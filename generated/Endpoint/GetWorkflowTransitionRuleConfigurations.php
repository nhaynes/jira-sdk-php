<?php

namespace JiraSdk\Endpoint;

class GetWorkflowTransitionRuleConfigurations extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a [paginated](#pagination) list of workflows with transition rules. The workflows can be filtered to return only those containing workflow transition rules:

    *  of one or more transition rule types, such as [workflow post functions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/).
    *  matching one or more transition rule keys.

    Only workflows containing transition rules created by the calling Connect app are returned.

    Due to server-side optimizations, workflows with an empty list of rules may be returned; these workflows can be ignored.

    **[Permissions](#permissions) required:** Only Connect apps can use this operation.
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $types The types of the transition rules to return.
    *     @var array $keys The transition rule class keys, as defined in the Connect app descriptor, of the transition rules to return.
    *     @var array $workflowNames EXPERIMENTAL: The list of workflow names to filter by.
    *     @var array $withTags EXPERIMENTAL: The list of `tags` to filter by.
    *     @var bool $draft EXPERIMENTAL: Whether draft or published workflows are returned. If not provided, both workflow types are returned.
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts `transition`, which, for each rule, returns information about the transition the rule is assigned to.
    * }
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return '/rest/api/3/workflow/rule/config';
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'types', 'keys', 'workflowNames', 'withTags', 'draft', 'expand'));
        $optionsResolver->setRequired(array('types'));
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 10));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('types', array('array'));
        $optionsResolver->addAllowedTypes('keys', array('array'));
        $optionsResolver->addAllowedTypes('workflowNames', array('array'));
        $optionsResolver->addAllowedTypes('withTags', array('array'));
        $optionsResolver->addAllowedTypes('draft', array('bool'));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetWorkflowTransitionRuleConfigurationsBadRequestException
     * @throws \JiraSdk\Exception\GetWorkflowTransitionRuleConfigurationsForbiddenException
     * @throws \JiraSdk\Exception\GetWorkflowTransitionRuleConfigurationsNotFoundException
     *
     * @return null|\JiraSdk\Model\PageBeanWorkflowTransitionRules
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanWorkflowTransitionRules', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetWorkflowTransitionRuleConfigurationsBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetWorkflowTransitionRuleConfigurationsForbiddenException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowTransitionRuleConfigurationsNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
