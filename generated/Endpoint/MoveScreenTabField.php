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

class MoveScreenTabField extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $screenId;
    protected $tabId;
    protected $id;

    /**
     * Moves a screen tab field.
     *
     * If `after` and `position` are provided in the request, `position` is ignored.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $screenId the ID of the screen
     * @param int    $tabId    the ID of the screen tab
     * @param string $id       the ID of the field
     */
    public function __construct(int $screenId, int $tabId, string $id, \JiraSdk\Api\Model\MoveFieldBean $requestBody)
    {
        $this->screenId = $screenId;
        $this->tabId = $tabId;
        $this->id = $id;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{screenId}', '{tabId}', '{id}'], [$this->screenId, $this->tabId, $this->id], '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields/{id}/move');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\MoveFieldBean) {
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
     * @throws \JiraSdk\Api\Exception\MoveScreenTabFieldBadRequestException
     * @throws \JiraSdk\Api\Exception\MoveScreenTabFieldUnauthorizedException
     * @throws \JiraSdk\Api\Exception\MoveScreenTabFieldForbiddenException
     * @throws \JiraSdk\Api\Exception\MoveScreenTabFieldNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (204 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\MoveScreenTabFieldBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\MoveScreenTabFieldUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\MoveScreenTabFieldForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\MoveScreenTabFieldNotFoundException($response);
        }
    }
}
