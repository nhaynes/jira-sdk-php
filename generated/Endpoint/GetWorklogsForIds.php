<?php

namespace JiraSdk\Endpoint;

class GetWorklogsForIds extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns worklog details for a list of worklog IDs.

    The returned list of worklogs is limited to 1000 items.

    **[Permissions](#permissions) required:** Permission to access Jira, however, worklogs are only returned where either of the following is true:

    *  the worklog is set as *Viewable by All Users*.
    *  the user is a member of a project role or group with permission to view the worklog.
    *
    * @param \JiraSdk\Model\WorklogIdsRequestBean $requestBody
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts `properties` that returns the properties of each worklog.
    * }
    */
    public function __construct(\JiraSdk\Model\WorklogIdsRequestBean $requestBody, array $queryParameters = array())
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/worklog/list';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\WorklogIdsRequestBean) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('expand'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('expand' => ''));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetWorklogsForIdsBadRequestException
     * @throws \JiraSdk\Exception\GetWorklogsForIdsUnauthorizedException
     *
     * @return null|\JiraSdk\Model\Worklog[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\Worklog[]', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetWorklogsForIdsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetWorklogsForIdsUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
