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

class ReplaceIssueFieldOption extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $fieldKey;
    protected $optionId;

    /**
     * Deselects an issue-field select-list option from all issues where it is selected. A different option can be selected to replace the deselected option. The update can also be limited to a smaller set of issues by using a JQL query.
     *
     * Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) can override the screen security configuration using `overrideScreenSecurity` and `overrideEditableFlag`.
     *
     * This is an [asynchronous operation](#async). The response object contains a link to the long-running task.
     *
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
     *
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
     *
     *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
     *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
     * @param int   $optionId        the ID of the option to be deselected
     * @param array $queryParameters {
     *
     *     @var int $replaceWith the ID of the option that will replace the currently selected option
     *     @var string $jql A JQL query that specifies the issues to be updated. For example, *project=10000*.
     *     @var bool $overrideScreenSecurity Whether screen security is overridden to enable hidden fields to be edited. Available to Connect and Forge app users with admin permission.
     *     @var bool $overrideEditableFlag Whether screen security is overridden to enable uneditable fields to be edited. Available to Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     * }
     */
    public function __construct(string $fieldKey, int $optionId, array $queryParameters = [])
    {
        $this->fieldKey = $fieldKey;
        $this->optionId = $optionId;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{fieldKey}', '{optionId}'], [$this->fieldKey, $this->optionId], '/rest/api/3/field/{fieldKey}/option/{optionId}/issue');
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

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['replaceWith', 'jql', 'overrideScreenSecurity', 'overrideEditableFlag']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['overrideScreenSecurity' => false, 'overrideEditableFlag' => false]);
        $optionsResolver->addAllowedTypes('replaceWith', ['int']);
        $optionsResolver->addAllowedTypes('jql', ['string']);
        $optionsResolver->addAllowedTypes('overrideScreenSecurity', ['bool']);
        $optionsResolver->addAllowedTypes('overrideEditableFlag', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\TaskProgressBeanRemoveOptionFromIssuesResult|null
     *
     * @throws \JiraSdk\Api\Exception\ReplaceIssueFieldOptionBadRequestException
     * @throws \JiraSdk\Api\Exception\ReplaceIssueFieldOptionForbiddenException
     * @throws \JiraSdk\Api\Exception\ReplaceIssueFieldOptionNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (303 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\TaskProgressBeanRemoveOptionFromIssuesResult', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\ReplaceIssueFieldOptionBadRequestException($response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\ReplaceIssueFieldOptionForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\ReplaceIssueFieldOptionNotFoundException($response);
        }
    }
}
