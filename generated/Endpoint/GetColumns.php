<?php

namespace JiraSdk\Endpoint;

class GetColumns extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Returns the columns configured for a filter. The column configuration is used when the filter's results are viewed in *List View* with the *Columns* set to *Filter*.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** None, however, column details are only returned for:

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
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/filter/{id}/columns');
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
     * @throws \JiraSdk\Exception\GetColumnsBadRequestException
     * @throws \JiraSdk\Exception\GetColumnsUnauthorizedException
     * @throws \JiraSdk\Exception\GetColumnsNotFoundException
     *
     * @return null|\JiraSdk\Model\ColumnItem[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ColumnItem[]', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetColumnsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetColumnsUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetColumnsNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
