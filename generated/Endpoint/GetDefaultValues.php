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

class GetDefaultValues extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $fieldId;

    /**
     * Returns a [paginated](#pagination) list of defaults for a custom field. The results can be filtered by `contextId`, otherwise all values are returned. If no defaults are set for a context, nothing is returned.
     * The returned object depends on type of the custom field:.
     *
     *  `CustomFieldContextDefaultValueDate` (type `datepicker`) for date fields.
     *  `CustomFieldContextDefaultValueDateTime` (type `datetimepicker`) for date-time fields.
     *  `CustomFieldContextDefaultValueSingleOption` (type `option.single`) for single choice select lists and radio buttons.
     *  `CustomFieldContextDefaultValueMultipleOption` (type `option.multiple`) for multiple choice select lists and checkboxes.
     *  `CustomFieldContextDefaultValueCascadingOption` (type `option.cascading`) for cascading select lists.
     *  `CustomFieldContextSingleUserPickerDefaults` (type `single.user.select`) for single users.
     *  `CustomFieldContextDefaultValueMultiUserPicker` (type `multi.user.select`) for user lists.
     *  `CustomFieldContextDefaultValueSingleGroupPicker` (type `grouppicker.single`) for single choice group pickers.
     *  `CustomFieldContextDefaultValueMultipleGroupPicker` (type `grouppicker.multiple`) for multiple choice group pickers.
     *  `CustomFieldContextDefaultValueURL` (type `url`) for URLs.
     *  `CustomFieldContextDefaultValueProject` (type `project`) for project pickers.
     *  `CustomFieldContextDefaultValueFloat` (type `float`) for floats (floating-point numbers).
     *  `CustomFieldContextDefaultValueLabels` (type `labels`) for labels.
     *  `CustomFieldContextDefaultValueTextField` (type `textfield`) for text fields.
     *  `CustomFieldContextDefaultValueTextArea` (type `textarea`) for text area fields.
     *  `CustomFieldContextDefaultValueReadOnly` (type `readonly`) for read only (text) fields.
     *  `CustomFieldContextDefaultValueMultipleVersion` (type `version.multiple`) for single choice version pickers.
     *  `CustomFieldContextDefaultValueSingleVersion` (type `version.single`) for multiple choice version pickers.
     *
     * Forge custom fields [types](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/#data-types) are also supported, returning:
     *
     *  `CustomFieldContextDefaultValueForgeStringFieldBean` (type `forge.string`) for Forge string fields.
     *  `CustomFieldContextDefaultValueForgeMultiStringFieldBean` (type `forge.string.list`) for Forge string collection fields.
     *  `CustomFieldContextDefaultValueForgeObjectFieldBean` (type `forge.object`) for Forge object fields.
     *  `CustomFieldContextDefaultValueForgeDateTimeFieldBean` (type `forge.datetime`) for Forge date-time fields.
     *  `CustomFieldContextDefaultValueForgeGroupFieldBean` (type `forge.group`) for Forge group fields.
     *  `CustomFieldContextDefaultValueForgeMultiGroupFieldBean` (type `forge.group.list`) for Forge group collection fields.
     *  `CustomFieldContextDefaultValueForgeNumberFieldBean` (type `forge.number`) for Forge number fields.
     *  `CustomFieldContextDefaultValueForgeUserFieldBean` (type `forge.user`) for Forge user fields.
     *  `CustomFieldContextDefaultValueForgeMultiUserFieldBean` (type `forge.user.list`) for Forge user collection fields.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId         the ID of the custom field, for example `customfield\_10000`
     * @param array  $queryParameters {
     *
     *     @var array $contextId the IDs of the contexts
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     */
    public function __construct(string $fieldId, array $queryParameters = [])
    {
        $this->fieldId = $fieldId;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{fieldId}'], [$this->fieldId], '/rest/api/3/field/{fieldId}/context/defaultValue');
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
        $optionsResolver->setDefined(['contextId', 'startAt', 'maxResults']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['startAt' => 0, 'maxResults' => 50]);
        $optionsResolver->addAllowedTypes('contextId', ['array']);
        $optionsResolver->addAllowedTypes('startAt', ['int']);
        $optionsResolver->addAllowedTypes('maxResults', ['int']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\PageBeanCustomFieldContextDefaultValue|null
     *
     * @throws \JiraSdk\Api\Exception\GetDefaultValuesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetDefaultValuesForbiddenException
     * @throws \JiraSdk\Api\Exception\GetDefaultValuesNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\PageBeanCustomFieldContextDefaultValue', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetDefaultValuesUnauthorizedException($response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetDefaultValuesForbiddenException($response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetDefaultValuesNotFoundException($response);
        }
    }
}
