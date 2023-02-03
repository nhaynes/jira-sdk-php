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

class AddScreenTab extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $screenId;

    /**
     * Creates a tab for a screen.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId the ID of the screen
     */
    public function __construct(int $screenId, \JiraSdk\Api\Model\ScreenableTab $requestBody)
    {
        $this->screenId = $screenId;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{screenId}'], [$this->screenId], '/rest/api/3/screens/{screenId}/tabs');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\ScreenableTab) {
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
     * @return \JiraSdk\Api\Model\ScreenableTab|null
     *
     * @throws \JiraSdk\Api\Exception\AddScreenTabBadRequestException
     * @throws \JiraSdk\Api\Exception\AddScreenTabUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddScreenTabForbiddenException
     * @throws \JiraSdk\Api\Exception\AddScreenTabNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ScreenableTab', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\AddScreenTabBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\AddScreenTabUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\AddScreenTabForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\AddScreenTabNotFoundException($response);
        }
    }
}
