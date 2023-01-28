<?php

namespace JiraSdk\Endpoint;

class GetIdsOfWorklogsModifiedSince extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a list of IDs and update timestamps for worklogs updated after a date and time.

    This resource is paginated, with a limit of 1000 worklogs per page. Each page lists worklogs from oldest to youngest. If the number of items in the date range exceeds 1000, `until` indicates the timestamp of the youngest item on the page. Also, `nextPage` provides the URL for the next page of worklogs. The `lastPage` parameter is set to true on the last page of worklogs.

    This resource does not return worklogs updated during the minute preceding the request.

    **[Permissions](#permissions) required:** Permission to access Jira, however, worklogs are only returned where either of the following is true:

    *  the worklog is set as *Viewable by All Users*.
    *  the user is a member of a project role or group with permission to view the worklog.
    *
    * @param array $queryParameters {
    *     @var int $since The date and time, as a UNIX timestamp in milliseconds, after which updated worklogs are returned.
    *     @var string $expand Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts `properties` that returns the properties of each worklog.
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
        return '/rest/api/3/worklog/updated';
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
        $optionsResolver->setDefined(array('since', 'expand'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('since' => 0, 'expand' => ''));
        $optionsResolver->addAllowedTypes('since', array('int'));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetIdsOfWorklogsModifiedSinceUnauthorizedException
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
            throw new \JiraSdk\Exception\GetIdsOfWorklogsModifiedSinceUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
