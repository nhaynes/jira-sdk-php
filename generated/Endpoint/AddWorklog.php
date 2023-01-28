<?php

namespace JiraSdk\Endpoint;

class AddWorklog extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    /**
    * Adds a worklog to an issue.

    Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* and *Work on issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key the issue.
    * @param \JiraSdk\Model\Worklog $requestBody
    * @param array $queryParameters {
    *     @var bool $notifyUsers Whether users watching the issue are notified by email.
    *     @var string $adjustEstimate Defines how to update the issue's time estimate, the options are:

    *  `new` Sets the estimate to a specific value, defined in `newEstimate`.
    *  `leave` Leaves the estimate unchanged.
    *  `manual` Reduces the estimate by amount specified in `reduceBy`.
    *  `auto` Reduces the estimate by the value of `timeSpent` in the worklog.
    *     @var string $newEstimate The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `new`.
    *     @var string $reduceBy The amount to reduce the issue's remaining estimate by, as days (\#d), hours (\#h), or minutes (\#m). For example, *2d*. Required when `adjustEstimate` is `manual`.
    *     @var string $expand Use [expand](#expansion) to include additional information about work logs in the response. This parameter accepts `properties`, which returns worklog properties.
    *     @var bool $overrideEditableFlag Whether the worklog entry should be added to the issue even if the issue is not editable, because jira.issue.editable set to false or missing. For example, the issue is closed. Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) can use this flag.
    * }
    */
    public function __construct(string $issueIdOrKey, \JiraSdk\Model\Worklog $requestBody, array $queryParameters = array())
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}'), array($this->issueIdOrKey), '/rest/api/3/issue/{issueIdOrKey}/worklog');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\Worklog) {
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
        $optionsResolver->setDefined(array('notifyUsers', 'adjustEstimate', 'newEstimate', 'reduceBy', 'expand', 'overrideEditableFlag'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('notifyUsers' => true, 'adjustEstimate' => 'auto', 'expand' => '', 'overrideEditableFlag' => false));
        $optionsResolver->addAllowedTypes('notifyUsers', array('bool'));
        $optionsResolver->addAllowedTypes('adjustEstimate', array('string'));
        $optionsResolver->addAllowedTypes('newEstimate', array('string'));
        $optionsResolver->addAllowedTypes('reduceBy', array('string'));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        $optionsResolver->addAllowedTypes('overrideEditableFlag', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\AddWorklogBadRequestException
     * @throws \JiraSdk\Exception\AddWorklogUnauthorizedException
     * @throws \JiraSdk\Exception\AddWorklogNotFoundException
     *
     * @return null|\JiraSdk\Model\Worklog
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\Worklog', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\AddWorklogBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AddWorklogUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\AddWorklogNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
