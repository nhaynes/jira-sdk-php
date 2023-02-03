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

class DeleteCustomFieldOption extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $fieldId;
    protected $contextId;
    protected $optionId;

    /**
     * Deletes a custom field option.
     *
     * Options with cascading options cannot be deleted without deleting the cascading options first.
     *
     * This operation works for custom field options created in Jira or the operations from this resource. **To work with issue field select list options created for Connect apps use the [Issue custom field options (apps)](#api-group-issue-custom-field-options--apps-) operations.**
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId   the ID of the custom field
     * @param int    $contextId the ID of the context from which an option should be deleted
     * @param int    $optionId  the ID of the option to delete
     */
    public function __construct(string $fieldId, int $contextId, int $optionId)
    {
        $this->fieldId = $fieldId;
        $this->contextId = $contextId;
        $this->optionId = $optionId;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{fieldId}', '{contextId}', '{optionId}'], [$this->fieldId, $this->contextId, $this->optionId], '/rest/api/3/field/{fieldId}/context/{contextId}/option/{optionId}');
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
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldOptionBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldOptionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldOptionForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldOptionNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\DeleteCustomFieldOptionBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteCustomFieldOptionUnauthorizedException($response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\DeleteCustomFieldOptionForbiddenException($response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\DeleteCustomFieldOptionNotFoundException($response);
        }
    }
}
