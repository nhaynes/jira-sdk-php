<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Endpoint;

class GetWorkflowsPaginated extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Returns a [paginated](#pagination) list of published classic workflows. When workflow names are specified, details of those workflows are returned. Otherwise, all published classic workflows are returned.
     *
     * This operation does not return next-gen workflows.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $workflowName The name of a workflow to return. To include multiple workflows, provide an ampersand-separated list. For example, `workflowName=name1&workflowName=name2`.
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *
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
     *     @var string $queryString string used to perform a case-insensitive partial match with workflow name
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `name` Sorts by workflow name.
     *  `created` Sorts by create time.
     *  `updated` Sorts by update time.
     *     @var bool $isActive Filters active and inactive workflows.
     * }
     */
    public function __construct(array $queryParameters = [])
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
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['startAt', 'maxResults', 'workflowName', 'expand', 'queryString', 'orderBy', 'isActive']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['startAt' => 0, 'maxResults' => 50]);
        $optionsResolver->addAllowedTypes('startAt', ['int']);
        $optionsResolver->addAllowedTypes('maxResults', ['int']);
        $optionsResolver->addAllowedTypes('workflowName', ['array']);
        $optionsResolver->addAllowedTypes('expand', ['string']);
        $optionsResolver->addAllowedTypes('queryString', ['string']);
        $optionsResolver->addAllowedTypes('orderBy', ['string']);
        $optionsResolver->addAllowedTypes('isActive', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\PageBeanWorkflow|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorkflowsPaginatedUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorkflowsPaginatedForbiddenException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\PageBeanWorkflow', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetWorkflowsPaginatedUnauthorizedException($response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetWorkflowsPaginatedForbiddenException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
    }
}
