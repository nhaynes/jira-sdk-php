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

namespace JiraSdk\Tests;

use JiraSdk\Api\Model\IssueUpdateDetails;

class IssueTest extends IntegrationTestCase
{
    /**
     * @covers \JiraSdk\Api\Client::createIssue
     */
    public function testCreateIssue()
    {
        $client = $this->createClient();
        $project = $this->getProjectKey();

        $issue = $client->createIssue(new IssueUpdateDetails([
            'fields' => [
                'project' => [
                    'key' => $project,
                ],
                'issuetype' => [
                    'name' => 'Task',
                ],
                'summary' => 'Integration Test Ticket',
                'description' => [
                    'type' => 'doc',
                    'version' => 1,
                    'content' => [
                        [
                            'type' => 'paragraph',
                            'content' => [
                                [
                                    'type' => 'text',
                                    'text' => 'This is a ticket created via an integration test',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]));

        $this->assertStringStartsWith($project . '-', $issue->getKey());
    }
}
