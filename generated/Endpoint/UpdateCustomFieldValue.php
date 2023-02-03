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

class UpdateCustomFieldValue extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $fieldIdOrKey;

    /**
     * Updates the value of a custom field on one or more issues. Custom fields can only be updated by the Forge app that created them.
     **[Permissions](#permissions) required:** Only the app that created the custom field can update its values with this operation.
     *
     * @param string $fieldIdOrKey    The ID or key of the custom field. For example, `customfield_10010`.
     * @param array  $queryParameters {
     *
     *     @var bool $generateChangelog Whether to generate a changelog for this update.
     * }
     */
    public function __construct(string $fieldIdOrKey, \JiraSdk\Api\Model\CustomFieldValueUpdateDetails $requestBody, array $queryParameters = [])
    {
        $this->fieldIdOrKey = $fieldIdOrKey;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{fieldIdOrKey}'], [$this->fieldIdOrKey], '/rest/api/3/app/field/{fieldIdOrKey}/value');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\CustomFieldValueUpdateDetails) {
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

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['generateChangelog']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['generateChangelog' => true]);
        $optionsResolver->addAllowedTypes('generateChangelog', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldValueBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldValueForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldValueNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (204 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateCustomFieldValueBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateCustomFieldValueForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateCustomFieldValueNotFoundException($response);
        }
    }
}
