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

class DeleteScreen extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $screenId;

    /**
     * Deletes a screen. A screen cannot be deleted if it is used in a screen scheme, workflow, or workflow draft.
     *
     * Only screens used in classic projects can be deleted.
     *
     * @param int $screenId the ID of the screen
     */
    public function __construct(int $screenId)
    {
        $this->screenId = $screenId;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{screenId}'], [$this->screenId], '/rest/api/3/screens/{screenId}');
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
     * @throws \JiraSdk\Api\Exception\DeleteScreenBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteScreenUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteScreenForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteScreenNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\DeleteScreenBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteScreenUnauthorizedException($response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\DeleteScreenForbiddenException($response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\DeleteScreenNotFoundException($response);
        }
    }
}
