<?php

namespace JiraSdk\Endpoint;

class GetWorkflowsPaginated extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a [paginated](#pagination) list of published classic workflows. When workflow names are specified, details of those workflows are returned. Otherwise, all published classic workflows are returned.

    This operation does not return next-gen workflows.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $workflowName The name of a workflow to return. To include multiple workflows, provide an ampersand-separated list. For example, `workflowName=name1&workflowName=name2`.
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:

    *  `transitions` For each workflow, returns information about the transitions inside the workflow.
    *  `transitions.rules` For each workflow transition, returns information about its rules. Transitions are included automatically if this expand is requested.
    *  `transitions.properties` For each workflow transition, returns information about its properties. Transitions are included automatically if this expand is requested.
    *  `statuses` For each workflow, returns information about the statuses inside the workflow.
    *  `statuses.properties` For each workflow status, returns information about its properties. Statuses are included automatically if this expand is requested.
    *  `default` For each workflow, returns information about whether this is the default workflow.
    *  `schemes` For each workflow, returns information about the workflow schemes the workflow is assigned to.
    *  `projects` For each workflow, returns information about the projects the workflow is assigned to, through workflow schemes.
    *  `hasDraftWorkflow` For each workflow, returns information about whether the workflow has a draft version.
    *  `operations` For each workflow, returns information about the actions that can be undertaken on the workflow.
    *     @var string $queryString String used to perform a case-insensitive partial match with workflow name.
    *     @var string $orderBy [Order](#ordering) the results by a field:

    *  `name` Sorts by workflow name.
    *  `created` Sorts by create time.
    *  `updated` Sorts by update time.
    *     @var bool $isActive Filters active and inactive workflows.
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
        return '/rest/api/3/workflow/search';
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'workflowName', 'expand', 'queryString', 'orderBy', 'isActive'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('workflowName', array('array'));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        $optionsResolver->addAllowedTypes('queryString', array('string'));
        $optionsResolver->addAllowedTypes('orderBy', array('string'));
        $optionsResolver->addAllowedTypes('isActive', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetWorkflowsPaginatedUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorkflowsPaginatedForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanWorkflow
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanWorkflow', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetWorkflowsPaginatedUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetWorkflowsPaginatedForbiddenException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
