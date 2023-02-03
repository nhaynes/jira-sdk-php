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

class UpdateUiModification extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $uiModificationId;

    /**
     * Updates a UI modification. UI modification can only be updated by Forge apps.
     *
     * Each UI modification can define up to 1000 contexts.
     *
     **[Permissions](#permissions) required:**
     *
     *  *None* if the UI modification is created without contexts.
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for one or more projects, if the UI modification is created with contexts.
     *
     * @param string $uiModificationId the ID of the UI modification
     */
    public function __construct(string $uiModificationId, \JiraSdk\Api\Model\UpdateUiModificationDetails $requestBody)
    {
        $this->uiModificationId = $uiModificationId;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{uiModificationId}'], [$this->uiModificationId], '/rest/api/3/uiModifications/{uiModificationId}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\UpdateUiModificationDetails) {
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
     * @throws \JiraSdk\Api\Exception\UpdateUiModificationBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateUiModificationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateUiModificationForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateUiModificationNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (204 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateUiModificationBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateUiModificationUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateUiModificationForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateUiModificationNotFoundException($response);
        }
    }
}
