<?php

namespace JiraSdk\Endpoint;

class RemoveWatcher extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    /**
    * Deletes a user as a watcher of an issue.

    This operation requires the **Allow users to watch issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  To remove users other than themselves from the watchlist, *Manage watcher list* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param array $queryParameters {
    *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required.
    * }
    */
    public function __construct(string $issueIdOrKey, array $queryParameters = array())
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}'), array($this->issueIdOrKey), '/rest/api/3/issue/{issueIdOrKey}/watchers');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('username', 'accountId'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('username', array('string'));
        $optionsResolver->addAllowedTypes('accountId', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\RemoveWatcherBadRequestException
     * @throws \JiraSdk\Exception\RemoveWatcherUnauthorizedException
     * @throws \JiraSdk\Exception\RemoveWatcherForbiddenException
     * @throws \JiraSdk\Exception\RemoveWatcherNotFoundException
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
            throw new \JiraSdk\Exception\RemoveWatcherBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\RemoveWatcherUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\RemoveWatcherForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\RemoveWatcherNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
