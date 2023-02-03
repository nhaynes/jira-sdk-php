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

class AppIssueFieldValueUpdateResourceUpdateIssueFieldsPut extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Updates the value of a custom field added by Connect apps on one or more issues.
     * The values of up to 200 custom fields can be updated.
     *
     **[Permissions](#permissions) required:** Only Connect apps can make this request.
     *
     * @param array $headerParameters {
     *
     *     @var string $Atlassian-Transfer-Id The ID of the transfer.
     * }
     */
    public function __construct(\JiraSdk\Api\Model\ConnectCustomFieldValues $requestBody, array $headerParameters = [])
    {
        $this->body = $requestBody;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return '/rest/atlassian-connect/1/migration/field';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\ConnectCustomFieldValues) {
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
        return [];
    }

    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['Atlassian-Transfer-Id']);
        $optionsResolver->setRequired(['Atlassian-Transfer-Id']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('Atlassian-Transfer-Id', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPutBadRequestException
     * @throws \JiraSdk\Api\Exception\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPutForbiddenException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPutBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPutForbiddenException($response);
        }
    }
}
