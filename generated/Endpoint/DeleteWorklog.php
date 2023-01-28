<?php

namespace JiraSdk\Endpoint;

class DeleteWorklog extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $id;
    /**
    * Deletes a worklog from an issue.

    Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  *Delete all worklogs*[ project permission](https://confluence.atlassian.com/x/yodKLg) to delete any worklog or *Delete own worklogs* to delete worklogs created by the user,
    *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $id The ID of the worklog.
    * @param array $queryParameters {
    *     @var bool $notifyUsers Whether users watching the issue are notified by email.
    *     @var string $adjustEstimate Defines how to update the issue's time estimate, the options are:

    *  `new` Sets the estimate to a specific value, defined in `newEstimate`.
    *  `leave` Leaves the estimate unchanged.
    *  `manual` Increases the estimate by amount specified in `increaseBy`.
    *  `auto` Reduces the estimate by the value of `timeSpent` in the worklog.
    *     @var string $newEstimate The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `new`.
    *     @var string $increaseBy The amount to increase the issue's remaining estimate by, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `manual`.
    *     @var bool $overrideEditableFlag Whether the work log entry should be added to the issue even if the issue is not editable, because jira.issue.editable set to false or missing. For example, the issue is closed. Connect and Forge app users with admin permission can use this flag.
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
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}', '{id}'), array($this->issueIdOrKey, $this->id), '/rest/api/3/issue/{issueIdOrKey}/worklog/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('notifyUsers', 'adjustEstimate', 'newEstimate', 'increaseBy', 'overrideEditableFlag'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('notifyUsers' => true, 'adjustEstimate' => 'auto', 'overrideEditableFlag' => false));
        $optionsResolver->addAllowedTypes('notifyUsers', array('bool'));
        $optionsResolver->addAllowedTypes('adjustEstimate', array('string'));
        $optionsResolver->addAllowedTypes('newEstimate', array('string'));
        $optionsResolver->addAllowedTypes('increaseBy', array('string'));
        $optionsResolver->addAllowedTypes('overrideEditableFlag', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteWorklogBadRequestException
     * @throws \JiraSdk\Exception\DeleteWorklogUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteWorklogNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\DeleteWorklogBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteWorklogUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteWorklogNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
