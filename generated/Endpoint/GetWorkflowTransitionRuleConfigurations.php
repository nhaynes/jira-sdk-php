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

class GetWorkflowTransitionRuleConfigurations extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Returns a [paginated](#pagination) list of workflows with transition rules. The workflows can be filtered to return only those containing workflow transition rules:.
     *
     *  of one or more transition rule types, such as [workflow post functions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/).
     *  matching one or more transition rule keys.
     *
     * Only workflows containing transition rules created by the calling Connect app are returned.
     *
     * Due to server-side optimizations, workflows with an empty list of rules may be returned; these workflows can be ignored.
     *
     **[Permissions](#permissions) required:** Only Connect apps can use this operation.
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $types the types of the transition rules to return
     *     @var array $keys the transition rule class keys, as defined in the Connect app descriptor, of the transition rules to return
     *     @var array $workflowNames EXPERIMENTAL: The list of workflow names to filter by
     *     @var array $withTags EXPERIMENTAL: The list of `tags` to filter by
     *     @var bool $draft EXPERIMENTAL: Whether draft or published workflows are returned. If not provided, both workflow types are returned.
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts `transition`, which, for each rule, returns information about the transition the rule is assigned to.
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
        return '/rest/api/3/workflow/rule/config';
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
        $optionsResolver->setDefined(['startAt', 'maxResults', 'types', 'keys', 'workflowNames', 'withTags', 'draft', 'expand']);
        $optionsResolver->setRequired(['types']);
        $optionsResolver->setDefaults(['startAt' => 0, 'maxResults' => 10]);
        $optionsResolver->addAllowedTypes('startAt', ['int']);
        $optionsResolver->addAllowedTypes('maxResults', ['int']);
        $optionsResolver->addAllowedTypes('types', ['array']);
        $optionsResolver->addAllowedTypes('keys', ['array']);
        $optionsResolver->addAllowedTypes('workflowNames', ['array']);
        $optionsResolver->addAllowedTypes('withTags', ['array']);
        $optionsResolver->addAllowedTypes('draft', ['bool']);
        $optionsResolver->addAllowedTypes('expand', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\PageBeanWorkflowTransitionRules|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionRuleConfigurationsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionRuleConfigurationsForbiddenException
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionRuleConfigurationsNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\PageBeanWorkflowTransitionRules', 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetWorkflowTransitionRuleConfigurationsBadRequestException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetWorkflowTransitionRuleConfigurationsForbiddenException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetWorkflowTransitionRuleConfigurationsNotFoundException($response);
        }
    }
}
