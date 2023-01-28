<?php

namespace JiraSdk\Endpoint;

class UpdateFieldConfigurationItems extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Updates fields in a field configuration. The properties of the field configuration fields provided override the existing values.

    This operation can only update field configurations used in company-managed (classic) projects.

    The operation can set the renderer for text fields to the default text renderer (`text-renderer`) or wiki style renderer (`wiki-renderer`). However, the renderer cannot be updated for fields using the autocomplete renderer (`autocomplete-renderer`).

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the field configuration.
    * @param \JiraSdk\Model\FieldConfigurationItemsDetails $requestBody
    */
    public function __construct(int $id, \JiraSdk\Model\FieldConfigurationItemsDetails $requestBody)
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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/fieldconfiguration/{id}/fields');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\FieldConfigurationItemsDetails) {
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
     * @throws \JiraSdk\Exception\UpdateFieldConfigurationItemsBadRequestException
     * @throws \JiraSdk\Exception\UpdateFieldConfigurationItemsUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateFieldConfigurationItemsForbiddenException
     * @throws \JiraSdk\Exception\UpdateFieldConfigurationItemsNotFoundException
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
            throw new \JiraSdk\Exception\UpdateFieldConfigurationItemsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateFieldConfigurationItemsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateFieldConfigurationItemsForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateFieldConfigurationItemsNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
