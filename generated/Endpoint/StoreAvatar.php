<?php

namespace JiraSdk\Endpoint;

class StoreAvatar extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $type;
    protected $entityId;
    /**
    * Loads a custom avatar for a project or issue type.

    Specify the avatar's local file location in the body of the request. Also, include the following headers:

    *  `X-Atlassian-Token: no-check` To prevent XSRF protection blocking the request, for more information see [Special Headers](#special-request-headers).
    *  `Content-Type: image/image type` Valid image types are JPEG, GIF, or PNG.

    For example:
    `curl --request POST `

    `--user email@example.com:<api_token> `

    `--header 'X-Atlassian-Token: no-check' `

    `--header 'Content-Type: image/< image_type>' `

    `--data-binary "<@/path/to/file/with/your/avatar>" `

    `--url 'https://your-domain.atlassian.net/rest/api/3/universal_avatar/type/{type}/owner/{entityId}'`

    The avatar is cropped to a square. If no crop parameters are specified, the square originates at the top left of the image. The length of the square's sides is set to the smaller of the height or width of the image.

    The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size.

    After creating the avatar use:

    *  [Update issue type](#api-rest-api-3-issuetype-id-put) to set it as the issue type's displayed avatar.
    *  [Set project avatar](#api-rest-api-3-project-projectIdOrKey-avatar-put) to set it as the project's displayed avatar.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $type The avatar type.
    * @param string $entityId The ID of the item the avatar is associated with.
    * @param mixed $requestBody
    * @param array $queryParameters {
    *     @var int $x The X coordinate of the top-left corner of the crop region.
    *     @var int $y The Y coordinate of the top-left corner of the crop region.
    *     @var int $size The length of each side of the crop region.
    * }
    */
    public function __construct(string $type, string $entityId, $requestBody, array $queryParameters = array())
    {
        $this->type = $type;
        $this->entityId = $entityId;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{type}', '{entityId}'), array($this->type, $this->entityId), '/rest/api/3/universal_avatar/type/{type}/owner/{entityId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (isset($this->body)) {
            return array(array('Content-Type' => array('*/*')), $this->body);
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('x', 'y', 'size'));
        $optionsResolver->setRequired(array('size'));
        $optionsResolver->setDefaults(array('x' => 0, 'y' => 0));
        $optionsResolver->addAllowedTypes('x', array('int'));
        $optionsResolver->addAllowedTypes('y', array('int'));
        $optionsResolver->addAllowedTypes('size', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\StoreAvatarBadRequestException
     * @throws \JiraSdk\Exception\StoreAvatarUnauthorizedException
     * @throws \JiraSdk\Exception\StoreAvatarForbiddenException
     * @throws \JiraSdk\Exception\StoreAvatarNotFoundException
     *
     * @return null|\JiraSdk\Model\Avatar
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\Avatar', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\StoreAvatarBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\StoreAvatarUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\StoreAvatarForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\StoreAvatarNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
