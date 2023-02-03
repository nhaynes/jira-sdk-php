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

class GetAvatars extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $type;
    protected $entityId;

    /**
     * Returns the system and custom avatars for a project or issue type.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  for custom project avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project the avatar belongs to.
     *  for custom issue type avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one project the issue type is used in.
     *  for system avatars, none.
     *
     * @param string $type     the avatar type
     * @param string $entityId the ID of the item the avatar is associated with
     */
    public function __construct(string $type, string $entityId)
    {
        $this->type = $type;
        $this->entityId = $entityId;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{type}', '{entityId}'], [$this->type, $this->entityId], '/rest/api/3/universal_avatar/type/{type}/owner/{entityId}');
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
     * @return \JiraSdk\Api\Model\Avatars|null
     *
     * @throws \JiraSdk\Api\Exception\GetAvatarsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAvatarsNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\Avatars', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetAvatarsUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetAvatarsNotFoundException($response);
        }
    }
}
