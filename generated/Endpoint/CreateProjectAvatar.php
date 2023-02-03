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

class CreateProjectAvatar extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;

    /**
     * Loads an avatar for a project.
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
     * `--url 'https://your-domain.atlassian.net/rest/api/3/project/{projectIdOrKey}/avatar2'`
     *
     * The avatar is cropped to a square. If no crop parameters are specified, the square originates at the top left of the image. The length of the square's sides is set to the smaller of the height or width of the image.
     *
     * The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size.
     *
     * After creating the avatar use [Set project avatar](#api-rest-api-3-project-projectIdOrKey-avatar-put) to set it as the project's displayed avatar.
     *
     **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectIdOrKey  the ID or (case-sensitive) key of the project
     * @param mixed  $requestBody
     * @param array  $queryParameters {
     *
     *     @var int $x the X coordinate of the top-left corner of the crop region
     *     @var int $y the Y coordinate of the top-left corner of the crop region
     *     @var int $size The length of each side of the crop region.
     * }
     */
    public function __construct(string $projectIdOrKey, $requestBody, array $queryParameters = [])
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{projectIdOrKey}'], [$this->projectIdOrKey], '/rest/api/3/project/{projectIdOrKey}/avatar2');
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
        $optionsResolver->setRequired([]);
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
     * @throws \JiraSdk\Api\Exception\CreateProjectAvatarBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateProjectAvatarUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateProjectAvatarForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateProjectAvatarNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\Avatar', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\CreateProjectAvatarBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\CreateProjectAvatarUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\CreateProjectAvatarForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\CreateProjectAvatarNotFoundException($response);
        }
    }
}
