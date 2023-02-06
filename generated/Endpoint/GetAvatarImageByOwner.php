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

class GetAvatarImageByOwner extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $type;
    protected $entityId;
    protected $accept;

    /**
     * Returns the avatar image for a project or issue type.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  For system avatars, none.
     *  For custom project avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project the avatar belongs to.
     *  For custom issue type avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one project the issue type is used in.
     *
     * @param string $type            the icon type of the avatar
     * @param string $entityId        the ID of the project or issue type the avatar belongs to
     * @param array  $queryParameters {
     *
     *     @var string $size The size of the avatar image. If not provided the default size is returned.
     *     @var string $format The format to return the avatar image in. If not provided the original content format is returned.
     * }
     *
     * @param array $accept Accept content header application/json|image/png|image/svg+xml|*\/*
     */
    public function __construct(string $type, string $entityId, array $queryParameters = [], array $accept = [])
    {
        $this->type = $type;
        $this->entityId = $entityId;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{type}', '{entityId}'], [$this->type, $this->entityId], '/rest/api/3/universal_avatar/view/type/{type}/owner/{entityId}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/json', 'image/png', 'image/svg+xml', '*\/*']];
        }

        return $this->accept;
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['size', 'format']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('size', ['string']);
        $optionsResolver->addAllowedTypes('format', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByOwnerBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByOwnerUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByOwnerForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByOwnerNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetAvatarImageByOwnerBadRequestException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetAvatarImageByOwnerUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetAvatarImageByOwnerForbiddenException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetAvatarImageByOwnerNotFoundException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
    }
}
