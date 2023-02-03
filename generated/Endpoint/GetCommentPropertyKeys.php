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

class GetCommentPropertyKeys extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $commentId;

    /**
     * Returns the keys of all the properties of a comment.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param string $commentId the ID of the comment
     */
    public function __construct(string $commentId)
    {
        $this->commentId = $commentId;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{commentId}'], [$this->commentId], '/rest/api/3/comment/{commentId}/properties');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\PropertyKeys|null
     *
     * @throws \JiraSdk\Api\Exception\GetCommentPropertyKeysBadRequestException
     * @throws \JiraSdk\Api\Exception\GetCommentPropertyKeysUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetCommentPropertyKeysForbiddenException
     * @throws \JiraSdk\Api\Exception\GetCommentPropertyKeysNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\PropertyKeys', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\GetCommentPropertyKeysBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetCommentPropertyKeysUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\GetCommentPropertyKeysForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetCommentPropertyKeysNotFoundException($response);
        }
    }
}
