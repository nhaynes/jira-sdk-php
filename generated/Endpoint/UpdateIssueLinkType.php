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

class UpdateIssueLinkType extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueLinkTypeId;

    /**
     * Updates an issue link type.
     *
     * To use this operation, the site must have [issue linking](https://confluence.atlassian.com/x/yoXKM) enabled.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueLinkTypeId the ID of the issue link type
     */
    public function __construct(string $issueLinkTypeId, \JiraSdk\Api\Model\IssueLinkType $requestBody)
    {
        $this->issueLinkTypeId = $issueLinkTypeId;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{issueLinkTypeId}'], [$this->issueLinkTypeId], '/rest/api/3/issueLinkType/{issueLinkTypeId}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\IssueLinkType) {
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
     * @return \JiraSdk\Api\Model\IssueLinkType|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateIssueLinkTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateIssueLinkTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateIssueLinkTypeNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\IssueLinkType', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateIssueLinkTypeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateIssueLinkTypeUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateIssueLinkTypeNotFoundException($response);
        }
    }
}
