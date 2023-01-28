<?php

namespace JiraSdk\Endpoint;

class SearchForIssuesUsingJqlPost extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Searches for issues using [JQL](https://confluence.atlassian.com/x/egORLQ).

    There is a [GET](#api-rest-api-3-search-get) version of this resource that can be used for smaller JQL query expressions.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** Issues are included in the response where the user has:

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param \JiraSdk\Model\SearchRequestBean $requestBody
    */
    public function __construct(\JiraSdk\Model\SearchRequestBean $requestBody)
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
        if ($this->body instanceof \JiraSdk\Model\SearchRequestBean) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\SearchForIssuesUsingJqlPostBadRequestException
     * @throws \JiraSdk\Exception\SearchForIssuesUsingJqlPostUnauthorizedException
     *
     * @return null|\JiraSdk\Model\SearchResults
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\SearchResults', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\SearchForIssuesUsingJqlPostBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SearchForIssuesUsingJqlPostUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
