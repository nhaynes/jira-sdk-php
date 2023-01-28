<?php

namespace JiraSdk\Endpoint;

class AddFieldToDefaultScreen extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldId;
    /**
     * Adds a field to the default tab of the default screen.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId The ID of the field.
     */
    public function __construct(string $fieldId)
    {
        $this->fieldId = $fieldId;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldId}'), array($this->fieldId), '/rest/api/3/screens/addToDefault/{fieldId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\AddFieldToDefaultScreenUnauthorizedException
     * @throws \JiraSdk\Exception\AddFieldToDefaultScreenForbiddenException
     * @throws \JiraSdk\Exception\AddFieldToDefaultScreenNotFoundException
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
        if (401 === $status) {
            throw new \JiraSdk\Exception\AddFieldToDefaultScreenUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\AddFieldToDefaultScreenForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\AddFieldToDefaultScreenNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
