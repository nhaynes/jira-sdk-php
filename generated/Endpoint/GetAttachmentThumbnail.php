<?php

namespace JiraSdk\Endpoint;

class GetAttachmentThumbnail extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Returns the thumbnail of an attachment.

    To return the attachment contents, use [Get attachment content](#api-rest-api-3-attachment-content-id-get).

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** For the issue containing the attachment:

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $id The ID of the attachment.
    * @param array $queryParameters {
    *     @var bool $redirect Whether a redirect is provided for the attachment download. Clients that do not automatically follow redirects can set this to `false` to avoid making multiple requests to download the attachment.
    *     @var bool $fallbackToDefault Whether a default thumbnail is returned when the requested thumbnail is not found.
    *     @var int $width The maximum width to scale the thumbnail to.
    *     @var int $height The maximum height to scale the thumbnail to.
    * }
    */
    public function __construct(string $id, array $queryParameters = array())
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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/attachment/thumbnail/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('redirect', 'fallbackToDefault', 'width', 'height'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('redirect' => true, 'fallbackToDefault' => true));
        $optionsResolver->addAllowedTypes('redirect', array('bool'));
        $optionsResolver->addAllowedTypes('fallbackToDefault', array('bool'));
        $optionsResolver->addAllowedTypes('width', array('int'));
        $optionsResolver->addAllowedTypes('height', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetAttachmentThumbnailBadRequestException
     * @throws \JiraSdk\Exception\GetAttachmentThumbnailUnauthorizedException
     * @throws \JiraSdk\Exception\GetAttachmentThumbnailForbiddenException
     * @throws \JiraSdk\Exception\GetAttachmentThumbnailNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (303 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetAttachmentThumbnailBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAttachmentThumbnailUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetAttachmentThumbnailForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetAttachmentThumbnailNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
