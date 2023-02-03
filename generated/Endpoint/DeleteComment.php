<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Endpoint;

class DeleteComment extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
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
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $id           the ID of the comment
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
        return str_replace(['{issueIdOrKey}', '{id}'], [$this->issueIdOrKey, $this->id], '/rest/api/3/issue/{issueIdOrKey}/comment/{id}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\DeleteCommentBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteCommentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteCommentNotFoundException
     * @throws \JiraSdk\Api\Exception\DeleteCommentMethodNotAllowedException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteCommentBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteCommentUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteCommentNotFoundException($response);
        }
        if (405 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteCommentMethodNotAllowedException($response);
        }
    }
}
