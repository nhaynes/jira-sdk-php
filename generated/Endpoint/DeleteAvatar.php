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

class DeleteAvatar extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $type;
    protected $owningObjectId;
    protected $id;

    /**
     * Deletes an avatar from a project or issue type.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $type           the avatar type
     * @param string $owningObjectId the ID of the item the avatar is associated with
     * @param int    $id             the ID of the avatar
     */
    public function __construct(string $type, string $owningObjectId, int $id)
    {
        $this->type = $type;
        $this->owningObjectId = $owningObjectId;
        $this->id = $id;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{type}', '{owningObjectId}', '{id}'], [$this->type, $this->owningObjectId, $this->id], '/rest/api/3/universal_avatar/type/{type}/owner/{owningObjectId}/avatar/{id}');
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
     * @throws \JiraSdk\Api\Exception\DeleteAvatarBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteAvatarForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteAvatarNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteAvatarBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteAvatarForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteAvatarNotFoundException($response);
        }
    }
}
