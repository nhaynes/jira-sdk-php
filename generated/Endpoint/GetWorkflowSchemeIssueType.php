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

class GetWorkflowSchemeIssueType extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $id;
    protected $issueType;

    /**
     * Returns the issue type-workflow mapping for an issue type in a workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id              the ID of the workflow scheme
     * @param string $issueType       the ID of the issue type
     * @param array  $queryParameters {
     *
     *     @var bool $returnDraftIfExists Returns the mapping from the workflow scheme's draft rather than the workflow scheme, if set to true. If no draft exists, the mapping from the workflow scheme is returned.
     * }
     */
    public function __construct(int $id, string $issueType, array $queryParameters = [])
    {
        $this->id = $id;
        $this->issueType = $issueType;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{id}', '{issueType}'], [$this->id, $this->issueType], '/rest/api/3/workflowscheme/{id}/issuetype/{issueType}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
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
        $optionsResolver->setDefined(['returnDraftIfExists']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['returnDraftIfExists' => false]);
        $optionsResolver->addAllowedTypes('returnDraftIfExists', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\IssueTypeWorkflowMapping|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeIssueTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeIssueTypeForbiddenException
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeIssueTypeNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\IssueTypeWorkflowMapping', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetWorkflowSchemeIssueTypeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\GetWorkflowSchemeIssueTypeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetWorkflowSchemeIssueTypeNotFoundException($response);
        }
    }
}
