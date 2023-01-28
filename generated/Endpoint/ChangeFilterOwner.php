<?php

namespace JiraSdk\Endpoint;

class ChangeFilterOwner extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Changes the owner of the filter.
     **[Permissions](#permissions) required:** Permission to access Jira. However, the user must own the filter or have the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the filter to update.
     * @param \JiraSdk\Model\ChangeFilterOwner $requestBody
     */
    public function __construct(int $id, \JiraSdk\Model\ChangeFilterOwner $requestBody)
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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/filter/{id}/owner');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\ChangeFilterOwner) {
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
     * @throws \JiraSdk\Exception\ChangeFilterOwnerBadRequestException
     * @throws \JiraSdk\Exception\ChangeFilterOwnerForbiddenException
     * @throws \JiraSdk\Exception\ChangeFilterOwnerNotFoundException
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
            throw new \JiraSdk\Exception\ChangeFilterOwnerBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\ChangeFilterOwnerForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\ChangeFilterOwnerNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
