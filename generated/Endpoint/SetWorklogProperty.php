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

class SetWorklogProperty extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $worklogId;
    protected $propertyKey;

    /**
     * Sets the value of a worklog property. Use this operation to store custom data against the worklog.
     *
     * The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  *Edit all worklogs*[ project permission](https://confluence.atlassian.com/x/yodKLg) to update any worklog or *Edit own worklogs* to update worklogs created by the user.
     *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $worklogId    the ID of the worklog
     * @param string $propertyKey  The key of the issue property. The maximum length is 255 characters.
     * @param mixed  $requestBody
     */
    public function __construct(string $issueIdOrKey, string $worklogId, string $propertyKey, $requestBody)
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->worklogId = $worklogId;
        $this->propertyKey = $propertyKey;
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{issueIdOrKey}', '{worklogId}', '{propertyKey}'], [$this->issueIdOrKey, $this->worklogId, $this->propertyKey], '/rest/api/3/issue/{issueIdOrKey}/worklog/{worklogId}/properties/{propertyKey}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (isset($this->body)) {
            return [['Content-Type' => ['application/json']], json_encode($this->body)];
        }

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
     * @throws \JiraSdk\Api\Exception\SetWorklogPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\SetWorklogPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetWorklogPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\SetWorklogPropertyNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if ((null === $contentType) === false && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\SetWorklogPropertyBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\SetWorklogPropertyUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\SetWorklogPropertyForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\SetWorklogPropertyNotFoundException($response);
        }
    }
}
