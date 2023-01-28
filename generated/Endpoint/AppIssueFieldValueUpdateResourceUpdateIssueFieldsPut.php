<?php

namespace JiraSdk\Endpoint;

class AppIssueFieldValueUpdateResourceUpdateIssueFieldsPut extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Updates the value of a custom field added by Connect apps on one or more issues.
    The values of up to 200 custom fields can be updated.

    **[Permissions](#permissions) required:** Only Connect apps can make this request.
    *
    * @param \JiraSdk\Model\ConnectCustomFieldValues $requestBody
    * @param array $headerParameters {
    *     @var string $Atlassian-Transfer-Id The ID of the transfer.
    * }
    */
    public function __construct(\JiraSdk\Model\ConnectCustomFieldValues $requestBody, array $headerParameters = array())
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
        if ($this->body instanceof \JiraSdk\Model\ConnectCustomFieldValues) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
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
     * @throws \JiraSdk\Exception\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPutBadRequestException
     * @throws \JiraSdk\Exception\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPutForbiddenException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPutBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPutForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array();
    }
}
