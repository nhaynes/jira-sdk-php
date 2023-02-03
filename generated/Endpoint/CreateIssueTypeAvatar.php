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

class CreateIssueTypeAvatar extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * Loads an avatar for the issue type.
     *
     * Specify the avatar's local file location in the body of the request. Also, include the following headers:
     *
     *  `X-Atlassian-Token: no-check` To prevent XSRF protection blocking the request, for more information see [Special Headers](#special-request-headers).
     *  `Content-Type: image/image type` Valid image types are JPEG, GIF, or PNG.
     *
     * For example:
     * `curl --request POST \ --user email@example.com:<api_token> \ --header 'X-Atlassian-Token: no-check' \ --header 'Content-Type: image/< image_type>' \ --data-binary "<@/path/to/file/with/your/avatar>" \ --url 'https://your-domain.atlassian.net/rest/api/3/issuetype/{issueTypeId}'This`
     *
     * The avatar is cropped to a square. If no crop parameters are specified, the square originates at the top left of the image. The length of the square's sides is set to the smaller of the height or width of the image.
     *
     * The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size.
     *
     * After creating the avatar, use [ Update issue type](#api-rest-api-3-issuetype-id-put) to set it as the issue type's displayed avatar.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id              the ID of the issue type
     * @param mixed  $requestBody
     * @param array  $queryParameters {
     *
     *     @var int $x the X coordinate of the top-left corner of the crop region
     *     @var int $y the Y coordinate of the top-left corner of the crop region
     *     @var int $size The length of each side of the crop region.
     * }
     */
    public function __construct(string $id, $requestBody, array $queryParameters = [])
    {
        $this->id = $id;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/rest/api/3/issuetype/{id}/avatar2');
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
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeAvatarBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeAvatarUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeAvatarForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeAvatarNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\Avatar', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\CreateIssueTypeAvatarBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\CreateIssueTypeAvatarUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\CreateIssueTypeAvatarForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\CreateIssueTypeAvatarNotFoundException($response);
        }
    }
}
