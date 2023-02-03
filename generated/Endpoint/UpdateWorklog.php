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

class UpdateWorklog extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $id;

    /**
     * Updates a worklog.
     *
     * Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).
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
     * @param string $issueIdOrKey    the ID or key the issue
     * @param string $id              the ID of the worklog
     * @param array  $queryParameters {
     *
     *     @var bool $notifyUsers whether users watching the issue are notified by email
     *     @var string $adjustEstimate Defines how to update the issue's time estimate, the options are:
     *
     *  `new` Sets the estimate to a specific value, defined in `newEstimate`.
     *  `leave` Leaves the estimate unchanged.
     *  `auto` Updates the estimate by the difference between the original and updated value of `timeSpent` or `timeSpentSeconds`.
     *     @var string $newEstimate The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `new`.
     *     @var string $expand Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts `properties`, which returns worklog properties.
     *     @var bool $overrideEditableFlag Whether the worklog should be added to the issue even if the issue is not editable. For example, because the issue is closed. Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) can use this flag.
     * }
     */
    public function __construct(string $issueIdOrKey, string $id, \JiraSdk\Api\Model\Worklog $requestBody, array $queryParameters = [])
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->id = $id;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{issueIdOrKey}', '{id}'], [$this->issueIdOrKey, $this->id], '/rest/api/3/issue/{issueIdOrKey}/worklog/{id}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Api\Model\Worklog) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
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

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['notifyUsers', 'adjustEstimate', 'newEstimate', 'expand', 'overrideEditableFlag']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['notifyUsers' => true, 'adjustEstimate' => 'auto', 'expand' => '', 'overrideEditableFlag' => false]);
        $optionsResolver->addAllowedTypes('notifyUsers', ['bool']);
        $optionsResolver->addAllowedTypes('adjustEstimate', ['string']);
        $optionsResolver->addAllowedTypes('newEstimate', ['string']);
        $optionsResolver->addAllowedTypes('expand', ['string']);
        $optionsResolver->addAllowedTypes('overrideEditableFlag', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\Worklog|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateWorklogBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateWorklogUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateWorklogNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\Worklog', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateWorklogBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateWorklogUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\UpdateWorklogNotFoundException($response);
        }
    }
}
