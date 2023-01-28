<?php

namespace JiraSdk\Endpoint;

class GetWorklog extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $id;
    /**
    * Returns a worklog.

    Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $id The ID of the worklog.
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information about work logs in the response. This parameter accepts

    `properties`, which returns worklog properties.
    * }
    */
    public function __construct(string $issueIdOrKey, string $id, array $queryParameters = array())
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}', '{id}'), array($this->issueIdOrKey, $this->id), '/rest/api/3/issue/{issueIdOrKey}/worklog/{id}');
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
        $optionsResolver->setDefined(array('expand'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('expand' => ''));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetWorklogUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorklogNotFoundException
     *
     * @return null|\JiraSdk\Model\Worklog
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\Worklog', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetWorklogUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetWorklogNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
