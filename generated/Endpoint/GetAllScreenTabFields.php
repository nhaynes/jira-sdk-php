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

class GetAllScreenTabFields extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;
    protected $screenId;
    protected $tabId;

    /**
     * Returns all fields for a screen tab.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) when the project key is specified, providing that the screen is associated with the project through a Screen Scheme and Issue Type Screen Scheme.
     *
     * @param int   $screenId        the ID of the screen
     * @param int   $tabId           the ID of the screen tab
     * @param array $queryParameters {
     *
     *     @var string $projectKey The key of the project.
     * }
     */
    public function __construct(int $screenId, int $tabId, array $queryParameters = [])
    {
        $this->screenId = $screenId;
        $this->tabId = $tabId;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{screenId}', '{tabId}'], [$this->screenId, $this->tabId], '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields');
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
        $optionsResolver->setDefined(['projectKey']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('projectKey', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\ScreenableField[]|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllScreenTabFieldsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllScreenTabFieldsForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAllScreenTabFieldsNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ScreenableField[]', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetAllScreenTabFieldsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\GetAllScreenTabFieldsForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\GetAllScreenTabFieldsNotFoundException($response);
        }
    }
}
