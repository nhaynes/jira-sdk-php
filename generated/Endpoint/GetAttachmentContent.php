<?php

namespace JiraSdk\Endpoint;

class GetAttachmentContent extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Returns the contents of an attachment. A `Range` header can be set to define a range of bytes within the attachment to download. See the [HTTP Range header standard](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Range) for details.

    To return a thumbnail of the attachment, use [Get attachment thumbnail](#api-rest-api-3-attachment-thumbnail-id-get).

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** For the issue containing the attachment:

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $id The ID of the attachment.
    * @param array $queryParameters {
    *     @var bool $redirect Whether a redirect is provided for the attachment download. Clients that do not automatically follow redirects can set this to `false` to avoid making multiple requests to download the attachment.
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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/attachment/content/{id}');
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
        $optionsResolver->setDefined(array('redirect'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('redirect' => true));
        $optionsResolver->addAllowedTypes('redirect', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetAttachmentContentBadRequestException
     * @throws \JiraSdk\Exception\GetAttachmentContentUnauthorizedException
     * @throws \JiraSdk\Exception\GetAttachmentContentForbiddenException
     * @throws \JiraSdk\Exception\GetAttachmentContentNotFoundException
     * @throws \JiraSdk\Exception\GetAttachmentContentRequestedRangeNotSatisfiableException
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
        if (206 === $status) {
            return null;
        }
        if (303 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetAttachmentContentBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAttachmentContentUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetAttachmentContentForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetAttachmentContentNotFoundException($response);
        }
        if (416 === $status) {
            throw new \JiraSdk\Exception\GetAttachmentContentRequestedRangeNotSatisfiableException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
