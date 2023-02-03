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

class MigrationResourceUpdateEntityPropertiesValuePut extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $entityType;

    /**
     * Updates the values of multiple entity properties for an object, up to 50 updates per request. This operation is for use by Connect apps during app migration.
     *
     * @param string                                     $entityType       the type indicating the object that contains the entity properties
     * @param \JiraSdk\Api\Model\EntityPropertyDetails[] $requestBody
     * @param array                                      $headerParameters {
     *
     *     @var string $Atlassian-Transfer-Id The app migration transfer ID.
     * }
     */
    public function __construct(string $entityType, array $requestBody, array $headerParameters = [])
    {
        $this->entityType = $entityType;
        $this->body = $requestBody;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{entityType}'], [$this->entityType], '/rest/atlassian-connect/1/migration/properties/{entityType}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (\is_array($this->body) && isset($this->body[0]) && $this->body[0] instanceof \JiraSdk\Api\Model\EntityPropertyDetails) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
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
     * @throws \JiraSdk\Api\Exception\MigrationResourceUpdateEntityPropertiesValuePutBadRequestException
     * @throws \JiraSdk\Api\Exception\MigrationResourceUpdateEntityPropertiesValuePutForbiddenException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\MigrationResourceUpdateEntityPropertiesValuePutBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\MigrationResourceUpdateEntityPropertiesValuePutForbiddenException($response);
        }
    }
}
