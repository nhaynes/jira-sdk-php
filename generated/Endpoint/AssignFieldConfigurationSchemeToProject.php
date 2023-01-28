<?php

namespace JiraSdk\Endpoint;

class AssignFieldConfigurationSchemeToProject extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Assigns a field configuration scheme to a project. If the field configuration scheme ID is `null`, the operation assigns the default field configuration scheme.

    Field configuration schemes can only be assigned to classic projects.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\FieldConfigurationSchemeProjectAssociation $requestBody
    */
    public function __construct(\JiraSdk\Model\FieldConfigurationSchemeProjectAssociation $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return '/rest/api/3/fieldconfigurationscheme/project';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\FieldConfigurationSchemeProjectAssociation) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\AssignFieldConfigurationSchemeToProjectBadRequestException
     * @throws \JiraSdk\Exception\AssignFieldConfigurationSchemeToProjectUnauthorizedException
     * @throws \JiraSdk\Exception\AssignFieldConfigurationSchemeToProjectForbiddenException
     * @throws \JiraSdk\Exception\AssignFieldConfigurationSchemeToProjectNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (204 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AssignFieldConfigurationSchemeToProjectBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AssignFieldConfigurationSchemeToProjectUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AssignFieldConfigurationSchemeToProjectForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\AssignFieldConfigurationSchemeToProjectNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
