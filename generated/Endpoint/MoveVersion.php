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

class MoveVersion extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * Modifies the version's sequence within the project, which affects the display order of the versions in Jira.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse projects* project permission for the project that contains the version.
     *
     * @param string $id the ID of the version to be moved
     */
    public function __construct(string $id, \JiraSdk\Api\Model\VersionMoveBean $requestBody)
    {
        $this->id = $id;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/rest/api/3/version/{id}/move');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\VersionMoveBean) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

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
     * @return \JiraSdk\Api\Model\Version|null
     *
     * @throws \JiraSdk\Api\Exception\MoveVersionBadRequestException
     * @throws \JiraSdk\Api\Exception\MoveVersionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\MoveVersionNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\Version', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\MoveVersionBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\MoveVersionUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\MoveVersionNotFoundException($response);
        }
    }
}
