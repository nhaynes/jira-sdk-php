<?php

namespace JiraSdk\Endpoint;

class AddVote extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    /**
    * Adds the user's vote to an issue. This is the equivalent of the user clicking *Vote* on an issue in Jira.

    This operation requires the **Allow users to vote on issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.

    **[Permissions](#permissions) required:**

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    */
    public function __construct(string $issueIdOrKey)
    {
        $this->issueIdOrKey = $issueIdOrKey;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}'), array($this->issueIdOrKey), '/rest/api/3/issue/{issueIdOrKey}/votes');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\AddVoteBadRequestException
     * @throws \JiraSdk\Exception\AddVoteUnauthorizedException
     * @throws \JiraSdk\Exception\AddVoteNotFoundException
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
            throw new \JiraSdk\Exception\AddVoteBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AddVoteUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\AddVoteNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
