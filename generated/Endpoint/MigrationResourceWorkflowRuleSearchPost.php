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

class MigrationResourceWorkflowRuleSearchPost extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

    /**
     * Returns configurations for workflow transition rules migrated from server to cloud and owned by the calling Connect app.
     *
     * @param array $headerParameters {
     *
     *     @var string $Atlassian-Transfer-Id The app migration transfer ID.
     * }
     */
    public function __construct(\JiraSdk\Api\Model\WorkflowRulesSearch $requestBody, array $headerParameters = [])
    {
        $this->body = $requestBody;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/rest/atlassian-connect/1/migration/workflow/rule/search';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\WorkflowRulesSearch) {
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
     * @return \JiraSdk\Api\Model\WorkflowRulesSearchDetails|null
     *
     * @throws \JiraSdk\Api\Exception\MigrationResourceWorkflowRuleSearchPostBadRequestException
     * @throws \JiraSdk\Api\Exception\MigrationResourceWorkflowRuleSearchPostForbiddenException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\WorkflowRulesSearchDetails', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\MigrationResourceWorkflowRuleSearchPostBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\MigrationResourceWorkflowRuleSearchPostForbiddenException($response);
        }
    }
}
