<?php

namespace JiraSdk\Endpoint;

class MigrationResourceUpdateEntityPropertiesValuePut extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $entityType;
    /**
     * Updates the values of multiple entity properties for an object, up to 50 updates per request. This operation is for use by Connect apps during app migration.
     *
     * @param string $entityType The type indicating the object that contains the entity properties.
     * @param \JiraSdk\Model\EntityPropertyDetails[] $requestBody
     * @param array $headerParameters {
     *     @var string $Atlassian-Transfer-Id The app migration transfer ID.
     * }
     */
    public function __construct(string $entityType, array $requestBody, array $headerParameters = array())
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
        return str_replace(array('{entityType}'), array($this->entityType), '/rest/atlassian-connect/1/migration/properties/{entityType}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (is_array($this->body) and isset($this->body[0]) and $this->body[0] instanceof \JiraSdk\Model\EntityPropertyDetails) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(array('Atlassian-Transfer-Id'));
        $optionsResolver->setRequired(array('Atlassian-Transfer-Id'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('Atlassian-Transfer-Id', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\MigrationResourceUpdateEntityPropertiesValuePutBadRequestException
     * @throws \JiraSdk\Exception\MigrationResourceUpdateEntityPropertiesValuePutForbiddenException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\MigrationResourceUpdateEntityPropertiesValuePutBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\MigrationResourceUpdateEntityPropertiesValuePutForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array();
    }
}
