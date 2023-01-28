<?php

namespace JiraSdk\Endpoint;

class DeleteComment extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $id;
    /**
     * Deletes a comment.
     **[Permissions](#permissions) required:**
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue containing the comment is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  *Delete all comments*[ project permission](https://confluence.atlassian.com/x/yodKLg) to delete any comment or *Delete own comments* to delete comment created by the user,
     *  If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $id The ID of the comment.
     */
    public function __construct(string $issueIdOrKey, string $id)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->id = $id;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{issueIdOrKey}', '{id}'), array($this->issueIdOrKey, $this->id), '/rest/api/3/issue/{issueIdOrKey}/comment/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteCommentBadRequestException
     * @throws \JiraSdk\Exception\DeleteCommentUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteCommentNotFoundException
     * @throws \JiraSdk\Exception\DeleteCommentMethodNotAllowedException
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
            throw new \JiraSdk\Exception\DeleteCommentBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteCommentUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteCommentNotFoundException($response);
        }
        if (405 === $status) {
            throw new \JiraSdk\Exception\DeleteCommentMethodNotAllowedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
