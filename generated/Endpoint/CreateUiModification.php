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

class CreateUiModification extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Creates a UI modification. UI modification can only be created by Forge apps.
     *
     * Each app can define up to 100 UI modifications. Each UI modification can define up to 1000 contexts.
     *
     **[Permissions](#permissions) required:**
     *
     *  *None* if the UI modification is created without contexts.
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for one or more projects, if the UI modification is created with contexts.
     */
    public function __construct(\JiraSdk\Api\Model\CreateUiModificationDetails $requestBody)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/rest/api/3/uiModifications';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\CreateUiModificationDetails) {
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
     * @return \JiraSdk\Api\Model\UiModificationIdentifiers|null
     *
     * @throws \JiraSdk\Api\Exception\CreateUiModificationBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateUiModificationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateUiModificationForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateUiModificationNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\UiModificationIdentifiers', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\CreateUiModificationBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\CreateUiModificationUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\CreateUiModificationForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\CreateUiModificationNotFoundException($response);
        }
    }
}
