<?php

namespace JiraSdk\Endpoint;

class ExpandAttachmentForMachines extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Returns the metadata for the contents of an attachment, if it is an archive. For example, if the attachment is a ZIP archive, then information about the files in the archive is returned. Currently, only the ZIP archive format is supported.

    Use this operation if you are processing the data without presenting it to the user, as this operation only returns the metadata for the contents of the attachment. Otherwise, to retrieve data to present to the user, use [ Get all metadata for an expanded attachment](#api-rest-api-3-attachment-id-expand-human-get) which also returns the metadata for the attachment itself, such as the attachment's ID and name.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** For the issue containing the attachment:

    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $id The ID of the attachment.
    */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/attachment/{id}/expand/raw');
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
     * @throws \JiraSdk\Exception\ExpandAttachmentForMachinesUnauthorizedException
     * @throws \JiraSdk\Exception\ExpandAttachmentForMachinesForbiddenException
     * @throws \JiraSdk\Exception\ExpandAttachmentForMachinesNotFoundException
     * @throws \JiraSdk\Exception\ExpandAttachmentForMachinesConflictException
     *
     * @return null|\JiraSdk\Model\AttachmentArchiveImpl
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\AttachmentArchiveImpl', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\ExpandAttachmentForMachinesUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\ExpandAttachmentForMachinesForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\ExpandAttachmentForMachinesNotFoundException($response);
        }
        if (409 === $status) {
            throw new \JiraSdk\Exception\ExpandAttachmentForMachinesConflictException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
