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

class GetAttachmentThumbnail extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * Returns the thumbnail of an attachment.
     *
     * To return the attachment contents, use [Get attachment content](#api-rest-api-3-attachment-content-id-get).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** For the issue containing the attachment:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $id              the ID of the attachment
     * @param array  $queryParameters {
     *
     *     @var bool $redirect Whether a redirect is provided for the attachment download. Clients that do not automatically follow redirects can set this to `false` to avoid making multiple requests to download the attachment.
     *     @var bool $fallbackToDefault whether a default thumbnail is returned when the requested thumbnail is not found
     *     @var int $width the maximum width to scale the thumbnail to
     *     @var int $height The maximum height to scale the thumbnail to.
     * }
     */
    public function __construct(string $id, array $queryParameters = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/rest/api/3/attachment/thumbnail/{id}');
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

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['redirect', 'fallbackToDefault', 'width', 'height']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['redirect' => true, 'fallbackToDefault' => true]);
        $optionsResolver->addAllowedTypes('redirect', ['bool']);
        $optionsResolver->addAllowedTypes('fallbackToDefault', ['bool']);
        $optionsResolver->addAllowedTypes('width', ['int']);
        $optionsResolver->addAllowedTypes('height', ['int']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\GetAttachmentThumbnailBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAttachmentThumbnailUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAttachmentThumbnailForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAttachmentThumbnailNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if (303 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\GetAttachmentThumbnailBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetAttachmentThumbnailUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\GetAttachmentThumbnailForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetAttachmentThumbnailNotFoundException($response);
        }
    }
}
