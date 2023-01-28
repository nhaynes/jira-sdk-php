<?php

namespace JiraSdk\Endpoint;

class ResetColumns extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Reset the user's column configuration for the filter to the default.
     **[Permissions](#permissions) required:** Permission to access Jira, however, columns are only reset for:
     *  filters owned by the user.
     *  filters shared with a group that the user is a member of.
     *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
     *  filters shared with a public project.
     *  filters shared with the public.
     *
     * @param int $id The ID of the filter.
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/filter/{id}/columns');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\ResetColumnsBadRequestException
     * @throws \JiraSdk\Exception\ResetColumnsUnauthorizedException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\ResetColumnsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\ResetColumnsUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
