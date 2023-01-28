<?php

namespace JiraSdk\Endpoint;

class GetAvailableScreenFields extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $screenId;
    /**
     * Returns the fields that can be added to a tab on a screen.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     */
    public function __construct(int $screenId)
    {
        $this->screenId = $screenId;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{screenId}'), array($this->screenId), '/rest/api/3/screens/{screenId}/availableFields');
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
     * @throws \JiraSdk\Exception\GetAvailableScreenFieldsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAvailableScreenFieldsForbiddenException
     * @throws \JiraSdk\Exception\GetAvailableScreenFieldsNotFoundException
     *
     * @return null|\JiraSdk\Model\ScreenableField[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ScreenableField[]', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAvailableScreenFieldsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetAvailableScreenFieldsForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetAvailableScreenFieldsNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
