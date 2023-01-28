<?php

namespace JiraSdk\Endpoint;

class GetIdsOfWorklogsDeletedSince extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a list of IDs and delete timestamps for worklogs deleted after a date and time.

    This resource is paginated, with a limit of 1000 worklogs per page. Each page lists worklogs from oldest to youngest. If the number of items in the date range exceeds 1000, `until` indicates the timestamp of the youngest item on the page. Also, `nextPage` provides the URL for the next page of worklogs. The `lastPage` parameter is set to true on the last page of worklogs.

    This resource does not return worklogs deleted during the minute preceding the request.

    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param array $queryParameters {
    *     @var int $since The date and time, as a UNIX timestamp in milliseconds, after which deleted worklogs are returned.
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
        return '/rest/api/3/worklog/deleted';
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
        $optionsResolver->setDefined(array('since'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('since' => 0));
        $optionsResolver->addAllowedTypes('since', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetIdsOfWorklogsDeletedSinceUnauthorizedException
     *
     * @return null|\JiraSdk\Model\ChangedWorklogs
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ChangedWorklogs', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetIdsOfWorklogsDeletedSinceUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
