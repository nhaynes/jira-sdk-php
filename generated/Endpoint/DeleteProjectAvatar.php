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

class DeleteProjectAvatar extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $id;

    /**
     * Deletes a custom avatar from a project. Note that system avatars cannot be deleted.
     **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectIdOrKey the project ID or (case-sensitive) key
     * @param int    $id             the ID of the avatar
     */
    public function __construct(string $projectIdOrKey, int $id)
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->id = $id;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{projectIdOrKey}', '{id}'], [$this->projectIdOrKey, $this->id], '/rest/api/3/project/{projectIdOrKey}/avatar/{id}');
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
     * @throws \JiraSdk\Api\Exception\DeleteProjectAvatarUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteProjectAvatarForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteProjectAvatarNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteProjectAvatarUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteProjectAvatarForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteProjectAvatarNotFoundException($response);
        }
    }
}
