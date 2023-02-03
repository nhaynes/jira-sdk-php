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

class UpdateIssueType extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * Updates the issue type.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id the ID of the issue type
     */
    public function __construct(string $id, \JiraSdk\Api\Model\IssueTypeUpdateBean $requestBody)
    {
        $this->id = $id;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/rest/api/3/issuetype/{id}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\IssueTypeUpdateBean) {
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
     * @return \JiraSdk\Api\Model\IssueTypeDetails|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeNotFoundException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeConflictException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\IssueTypeDetails', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateIssueTypeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateIssueTypeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateIssueTypeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateIssueTypeNotFoundException($response);
        }
        if (409 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateIssueTypeConflictException($response);
        }
    }
}
