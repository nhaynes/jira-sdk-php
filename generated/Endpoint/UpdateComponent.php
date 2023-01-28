<?php

namespace JiraSdk\Endpoint;

class UpdateComponent extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Updates a component. Any fields included in the request are overwritten. If `leadAccountId` is an empty string ("") the component lead is removed.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the component or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $id The ID of the component.
    * @param \JiraSdk\Model\ProjectComponent $requestBody
    */
    public function __construct(string $id, \JiraSdk\Model\ProjectComponent $requestBody)
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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/component/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\ProjectComponent) {
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
     * @throws \JiraSdk\Exception\UpdateComponentBadRequestException
     * @throws \JiraSdk\Exception\UpdateComponentUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateComponentForbiddenException
     * @throws \JiraSdk\Exception\UpdateComponentNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectComponent
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ProjectComponent', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\UpdateComponentBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateComponentUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateComponentForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateComponentNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
