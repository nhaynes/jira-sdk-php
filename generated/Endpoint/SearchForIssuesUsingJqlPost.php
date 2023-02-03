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

class SearchForIssuesUsingJqlPost extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Searches for issues using [JQL](https://confluence.atlassian.com/x/egORLQ).
     *
     * There is a [GET](#api-rest-api-3-search-get) version of this resource that can be used for smaller JQL query expressions.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** Issues are included in the response where the user has:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     */
    public function __construct(\JiraSdk\Api\Model\SearchRequestBean $requestBody)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/rest/api/3/search';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\SearchRequestBean) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

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

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\SearchResults|null
     *
     * @throws \JiraSdk\Api\Exception\SearchForIssuesUsingJqlPostBadRequestException
     * @throws \JiraSdk\Api\Exception\SearchForIssuesUsingJqlPostUnauthorizedException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\SearchResults', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\SearchForIssuesUsingJqlPostBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\SearchForIssuesUsingJqlPostUnauthorizedException($response);
        }
    }
}
