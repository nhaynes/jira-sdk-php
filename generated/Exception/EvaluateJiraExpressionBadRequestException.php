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

namespace JiraSdk\Api\Exception;

class EvaluateJiraExpressionBadRequestException extends BadRequestException
{
    /**
     * @var \JiraSdk\Api\Model\ErrorCollection
     */
    private $errorCollection;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    public function __construct(\JiraSdk\Api\Model\ErrorCollection $errorCollection, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Returned if:

 *  the request is invalid, that is:

     *  invalid data is provided, such as a request including issue ID and key.
     *  the expression is invalid and can not be parsed.
 *  evaluation fails at runtime. This may happen for various reasons. For example, accessing a property on a null object (such as the expression `issue.id` where `issue` is `null`). In this case an error message is provided.');
        $this->errorCollection = $errorCollection;
        $this->response = $response;
    }

    public function getErrorCollection(): \JiraSdk\Api\Model\ErrorCollection
    {
        return $this->errorCollection;
    }

    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
