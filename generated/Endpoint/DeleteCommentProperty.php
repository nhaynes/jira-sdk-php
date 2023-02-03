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

class DeleteCommentProperty extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $commentId;
    protected $propertyKey;

    /**
     * Deletes a comment property.
     *
     **[Permissions](#permissions) required:** either of:
     *
     *  *Edit All Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to delete a property from any comment.
     *  *Edit Own Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to delete a property from a comment created by the user.
     *
     * Also, when the visibility of a comment is restricted to a role or group the user must be a member of that role or group.
     *
     * @param string $commentId   the ID of the comment
     * @param string $propertyKey the key of the property
     */
    public function __construct(string $commentId, string $propertyKey)
    {
        $this->commentId = $commentId;
        $this->propertyKey = $propertyKey;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{commentId}', '{propertyKey}'], [$this->commentId, $this->propertyKey], '/rest/api/3/comment/{commentId}/properties/{propertyKey}');
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
     * @throws \JiraSdk\Api\Exception\DeleteCommentPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteCommentPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteCommentPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteCommentPropertyNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteCommentPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteCommentPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteCommentPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteCommentPropertyNotFoundException($response);
        }
    }
}
