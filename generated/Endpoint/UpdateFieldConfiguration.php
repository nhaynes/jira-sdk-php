<?php

namespace JiraSdk\Endpoint;

class UpdateFieldConfiguration extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Updates a field configuration. The name and the description provided in the request override the existing values.

    This operation can only update configurations used in company-managed (classic) projects.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the field configuration.
    * @param \JiraSdk\Model\FieldConfigurationDetails $requestBody
    */
    public function __construct(int $id, \JiraSdk\Model\FieldConfigurationDetails $requestBody)
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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/fieldconfiguration/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\FieldConfigurationDetails) {
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
     * @throws \JiraSdk\Exception\UpdateFieldConfigurationBadRequestException
     * @throws \JiraSdk\Exception\UpdateFieldConfigurationUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateFieldConfigurationForbiddenException
     * @throws \JiraSdk\Exception\UpdateFieldConfigurationNotFoundException
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
        if (400 === $status) {
            throw new \JiraSdk\Exception\UpdateFieldConfigurationBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateFieldConfigurationUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateFieldConfigurationForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateFieldConfigurationNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
