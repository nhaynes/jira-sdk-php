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

class GetProjectComponentsPaginated extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;

    /**
     * Returns a [paginated](#pagination) list of all components in a project. See the [Get project components](#api-rest-api-3-project-projectIdOrKey-components-get) resource if you want to get a full list of versions without pagination.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param string $projectIdOrKey  the project ID or project key (case sensitive)
     * @param array  $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `description` Sorts by the component description.
     *  `issueCount` Sorts by the count of issues associated with the component.
     *  `lead` Sorts by the user key of the component's project lead.
     *  `name` Sorts by component name.
     *     @var string $query Filter the results using a literal string. Components with a matching `name` or `description` are returned (case insensitive).
     * }
     */
    public function __construct(string $projectIdOrKey, array $queryParameters = [])
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{projectIdOrKey}'], [$this->projectIdOrKey], '/rest/api/3/project/{projectIdOrKey}/component');
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
        $optionsResolver->setDefined(['startAt', 'maxResults', 'orderBy', 'query']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['startAt' => 0, 'maxResults' => 50]);
        $optionsResolver->addAllowedTypes('startAt', ['int']);
        $optionsResolver->addAllowedTypes('maxResults', ['int']);
        $optionsResolver->addAllowedTypes('orderBy', ['string']);
        $optionsResolver->addAllowedTypes('query', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\PageBeanComponentWithIssueCount|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectComponentsPaginatedUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectComponentsPaginatedNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\PageBeanComponentWithIssueCount', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectComponentsPaginatedUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetProjectComponentsPaginatedNotFoundException($response);
        }
    }
}
