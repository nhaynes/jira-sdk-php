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

class GetAllSystemAvatars extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $type;

    /**
     * Returns a list of system avatar details by owner type, where the owner types are issue type, project, or user.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param string $type the avatar type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{type}'], [$this->type], '/rest/api/3/avatar/{type}/system');
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
     * @return \JiraSdk\Api\Model\SystemAvatars|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllSystemAvatarsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllSystemAvatarsInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\SystemAvatars', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetAllSystemAvatarsUnauthorizedException($response);
        }
        if (500 === $status) {
            throw new \JiraSdk\Api\Exception\GetAllSystemAvatarsInternalServerErrorException($response);
        }
    }
}
