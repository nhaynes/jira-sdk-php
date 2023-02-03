<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Endpoint;

class ExpandAttachmentForMachines extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * Returns the metadata for the contents of an attachment, if it is an archive. For example, if the attachment is a ZIP archive, then information about the files in the archive is returned. Currently, only the ZIP archive format is supported.
     *
     * Use this operation if you are processing the data without presenting it to the user, as this operation only returns the metadata for the contents of the attachment. Otherwise, to retrieve data to present to the user, use [ Get all metadata for an expanded attachment](#api-rest-api-3-attachment-id-expand-human-get) which also returns the metadata for the attachment itself, such as the attachment's ID and name.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** For the issue containing the attachment:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $id the ID of the attachment
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
        return str_replace(['{id}'], [$this->id], '/rest/api/3/attachment/{id}/expand/raw');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\AttachmentArchiveImpl|null
     *
     * @throws \JiraSdk\Api\Exception\ExpandAttachmentForMachinesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\ExpandAttachmentForMachinesForbiddenException
     * @throws \JiraSdk\Api\Exception\ExpandAttachmentForMachinesNotFoundException
     * @throws \JiraSdk\Api\Exception\ExpandAttachmentForMachinesConflictException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\AttachmentArchiveImpl', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\ExpandAttachmentForMachinesUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\ExpandAttachmentForMachinesForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\ExpandAttachmentForMachinesNotFoundException($response);
        }
        if (409 === $status) {
            throw new \JiraSdk\Api\Exception\ExpandAttachmentForMachinesConflictException($response);
        }
    }
}
