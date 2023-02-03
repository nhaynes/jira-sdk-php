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

class RemoveScreenTabField extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $screenId;
    protected $tabId;
    protected $id;

    /**
     * Removes a field from a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $screenId the ID of the screen
     * @param int    $tabId    the ID of the screen tab
     * @param string $id       the ID of the field
     */
    public function __construct(int $screenId, int $tabId, string $id)
    {
        $this->screenId = $screenId;
        $this->tabId = $tabId;
        $this->id = $id;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{screenId}', '{tabId}', '{id}'], [$this->screenId, $this->tabId, $this->id], '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields/{id}');
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
     * @throws \JiraSdk\Api\Exception\RemoveScreenTabFieldBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveScreenTabFieldUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveScreenTabFieldForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveScreenTabFieldNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveScreenTabFieldBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveScreenTabFieldUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveScreenTabFieldForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\RemoveScreenTabFieldNotFoundException($response);
        }
    }
}
