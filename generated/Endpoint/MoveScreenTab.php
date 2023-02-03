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

class MoveScreenTab extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $screenId;
    protected $tabId;
    protected $pos;

    /**
     * Moves a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId the ID of the screen
     * @param int $tabId    the ID of the screen tab
     * @param int $pos      The position of tab. The base index is 0.
     */
    public function __construct(int $screenId, int $tabId, int $pos)
    {
        $this->screenId = $screenId;
        $this->tabId = $tabId;
        $this->pos = $pos;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{screenId}', '{tabId}', '{pos}'], [$this->screenId, $this->tabId, $this->pos], '/rest/api/3/screens/{screenId}/tabs/{tabId}/move/{pos}');
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
     * @throws \JiraSdk\Api\Exception\MoveScreenTabBadRequestException
     * @throws \JiraSdk\Api\Exception\MoveScreenTabUnauthorizedException
     * @throws \JiraSdk\Api\Exception\MoveScreenTabForbiddenException
     * @throws \JiraSdk\Api\Exception\MoveScreenTabNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (204 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\MoveScreenTabBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\MoveScreenTabUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\MoveScreenTabForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\MoveScreenTabNotFoundException($response);
        }
    }
}
