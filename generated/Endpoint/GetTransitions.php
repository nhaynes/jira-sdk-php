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

class GetTransitions extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;

    /**
     * Returns either all transitions or a transition that can be performed by the user on an issue, based on the issue's status.
     *
     * Note, if a request is made for a transition that does not exist or cannot be performed on the issue, given its status, the response will return any empty transitions list.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required: A list or transition is returned only when the user has:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * However, if the user does not have the *Transition issues* [ project permission](https://confluence.atlassian.com/x/yodKLg) the response will not list any transitions.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param array  $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about transitions in the response. This parameter accepts `transitions.fields`, which returns information about the fields in the transition screen for each transition. Fields hidden from the screen are not returned. Use this information to populate the `fields` and `update` fields in [Transition issue](#api-rest-api-3-issue-issueIdOrKey-transitions-post).
     *     @var string $transitionId the ID of the transition
     *     @var bool $skipRemoteOnlyCondition whether transitions with the condition *Hide From User Condition* are included in the response
     *     @var bool $includeUnavailableTransitions Whether details of transitions that fail a condition are included in the response
     *     @var bool $sortByOpsBarAndStatus Whether the transitions are sorted by ops-bar sequence value first then category order (Todo, In Progress, Done) or only by ops-bar sequence value.
     * }
     */
    public function __construct(string $issueIdOrKey, array $queryParameters = [])
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{issueIdOrKey}'], [$this->issueIdOrKey], '/rest/api/3/issue/{issueIdOrKey}/transitions');
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
        $optionsResolver->setDefined(['expand', 'transitionId', 'skipRemoteOnlyCondition', 'includeUnavailableTransitions', 'sortByOpsBarAndStatus']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['skipRemoteOnlyCondition' => false, 'includeUnavailableTransitions' => false, 'sortByOpsBarAndStatus' => false]);
        $optionsResolver->addAllowedTypes('expand', ['string']);
        $optionsResolver->addAllowedTypes('transitionId', ['string']);
        $optionsResolver->addAllowedTypes('skipRemoteOnlyCondition', ['bool']);
        $optionsResolver->addAllowedTypes('includeUnavailableTransitions', ['bool']);
        $optionsResolver->addAllowedTypes('sortByOpsBarAndStatus', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\Transitions|null
     *
     * @throws \JiraSdk\Api\Exception\GetTransitionsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetTransitionsNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\Transitions', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetTransitionsUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetTransitionsNotFoundException($response);
        }
    }
}
