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

class StoreAvatar extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $type;
    protected $entityId;

    /**
     * Loads a custom avatar for a project or issue type.
     *
     * Specify the avatar's local file location in the body of the request. Also, include the following headers:
     *
     *  `X-Atlassian-Token: no-check` To prevent XSRF protection blocking the request, for more information see [Special Headers](#special-request-headers).
     *  `Content-Type: image/image type` Valid image types are JPEG, GIF, or PNG.
     *
     * For example:
     * `curl --request POST `
     *
     * `--user email@example.com:<api_token> `
     *
     * `--header 'X-Atlassian-Token: no-check' `
     *
     * `--header 'Content-Type: image/< image_type>' `
     *
     * `--data-binary "<@/path/to/file/with/your/avatar>" `
     *
     * `--url 'https://your-domain.atlassian.net/rest/api/3/universal_avatar/type/{type}/owner/{entityId}'`
     *
     * The avatar is cropped to a square. If no crop parameters are specified, the square originates at the top left of the image. The length of the square's sides is set to the smaller of the height or width of the image.
     *
     * The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size.
     *
     * After creating the avatar use:
     *
     *  [Update issue type](#api-rest-api-3-issuetype-id-put) to set it as the issue type's displayed avatar.
     *  [Set project avatar](#api-rest-api-3-project-projectIdOrKey-avatar-put) to set it as the project's displayed avatar.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $type            the avatar type
     * @param string $entityId        the ID of the item the avatar is associated with
     * @param mixed  $requestBody
     * @param array  $queryParameters {
     *
     *     @var int $x the X coordinate of the top-left corner of the crop region
     *     @var int $y the Y coordinate of the top-left corner of the crop region
     *     @var int $size The length of each side of the crop region.
     * }
     */
    public function __construct(string $type, string $entityId, $requestBody, array $queryParameters = [])
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
        return str_replace(['{type}', '{entityId}'], [$this->type, $this->entityId], '/rest/api/3/universal_avatar/type/{type}/owner/{entityId}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (isset($this->body)) {
            return [['Content-Type' => ['*/*']], $this->body];
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

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['x', 'y', 'size']);
        $optionsResolver->setRequired(['size']);
        $optionsResolver->setDefaults(['x' => 0, 'y' => 0]);
        $optionsResolver->addAllowedTypes('x', ['int']);
        $optionsResolver->addAllowedTypes('y', ['int']);
        $optionsResolver->addAllowedTypes('size', ['int']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\Avatar|null
     *
     * @throws \JiraSdk\Api\Exception\StoreAvatarBadRequestException
     * @throws \JiraSdk\Api\Exception\StoreAvatarUnauthorizedException
     * @throws \JiraSdk\Api\Exception\StoreAvatarForbiddenException
     * @throws \JiraSdk\Api\Exception\StoreAvatarNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\Avatar', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\StoreAvatarBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\StoreAvatarUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\StoreAvatarForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\StoreAvatarNotFoundException($response);
        }
    }
}
