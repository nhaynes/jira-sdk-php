<?php

namespace JiraSdk\Endpoint;

class AddWatcher extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    /**
    * Adds a user as a watcher of an issue by passing the account ID of the user. For example, `"5b10ac8d82e05b22cc7d4ef5"`. If no user is specified the calling user is added.

    This operation requires the **Allow users to watch issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  To add users other than themselves to the watchlist, *Manage watcher list* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $requestBody
    */
    public function __construct(string $issueIdOrKey, string $requestBody)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}'), array($this->issueIdOrKey), '/rest/api/3/issue/{issueIdOrKey}/watchers');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (is_string($this->body)) {
            return array(array('Content-Type' => array('application/json')), json_encode($this->body));
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
     * @throws \JiraSdk\Exception\AddWatcherBadRequestException
     * @throws \JiraSdk\Exception\AddWatcherUnauthorizedException
     * @throws \JiraSdk\Exception\AddWatcherForbiddenException
     * @throws \JiraSdk\Exception\AddWatcherNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (204 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\AddWatcherBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AddWatcherUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\AddWatcherForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\AddWatcherNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
