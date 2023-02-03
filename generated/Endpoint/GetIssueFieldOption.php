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

class GetIssueFieldOption extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $fieldKey;
    protected $optionId;

    /**
     * Returns an option from a select list issue field.
     *
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
     *
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
     *
     *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
     *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
     * @param int $optionId the ID of the option to be returned
     */
    public function __construct(string $fieldKey, int $optionId)
    {
        $this->fieldKey = $fieldKey;
        $this->optionId = $optionId;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{fieldKey}', '{optionId}'], [$this->fieldKey, $this->optionId], '/rest/api/3/field/{fieldKey}/option/{optionId}');
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
     * @return \JiraSdk\Api\Model\IssueFieldOption|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueFieldOptionBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueFieldOptionForbiddenException
     * @throws \JiraSdk\Api\Exception\GetIssueFieldOptionNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\IssueFieldOption', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\GetIssueFieldOptionBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\GetIssueFieldOptionForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetIssueFieldOptionNotFoundException($response);
        }
    }
}
