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

class DeleteWorklog extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $issueIdOrKey;
    protected $id;

    /**
     * Deletes a worklog from an issue.
     *
     * Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  *Delete all worklogs*[ project permission](https://confluence.atlassian.com/x/yodKLg) to delete any worklog or *Delete own worklogs* to delete worklogs created by the user,
     *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param string $id              the ID of the worklog
     * @param array  $queryParameters {
     *
     *     @var bool $notifyUsers whether users watching the issue are notified by email
     *     @var string $adjustEstimate Defines how to update the issue's time estimate, the options are:
     *
     *  `new` Sets the estimate to a specific value, defined in `newEstimate`.
     *  `leave` Leaves the estimate unchanged.
     *  `manual` Increases the estimate by amount specified in `increaseBy`.
     *  `auto` Reduces the estimate by the value of `timeSpent` in the worklog.
     *     @var string $newEstimate The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `new`.
     *     @var string $increaseBy The amount to increase the issue's remaining estimate by, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `manual`.
     *     @var bool $overrideEditableFlag Whether the work log entry should be added to the issue even if the issue is not editable, because jira.issue.editable set to false or missing. For example, the issue is closed. Connect and Forge app users with admin permission can use this flag.
     * }
     */
    public function __construct(string $issueIdOrKey, string $id, array $queryParameters = [])
    {
        $this->issueIdOrKey = $issueIdOrKey;
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{issueIdOrKey}', '{id}'], [$this->issueIdOrKey, $this->id], '/rest/api/3/issue/{issueIdOrKey}/worklog/{id}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['notifyUsers', 'adjustEstimate', 'newEstimate', 'increaseBy', 'overrideEditableFlag']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['notifyUsers' => true, 'adjustEstimate' => 'auto', 'overrideEditableFlag' => false]);
        $optionsResolver->addAllowedTypes('notifyUsers', ['bool']);
        $optionsResolver->addAllowedTypes('adjustEstimate', ['string']);
        $optionsResolver->addAllowedTypes('newEstimate', ['string']);
        $optionsResolver->addAllowedTypes('increaseBy', ['string']);
        $optionsResolver->addAllowedTypes('overrideEditableFlag', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Api\Exception\DeleteWorklogBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteWorklogUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteWorklogNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteWorklogBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteWorklogUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\DeleteWorklogNotFoundException($response);
        }
    }
}
