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

use JiraSdk\Api\Model\CreateProjectDetails;
use JiraSdk\Api\Model\ProjectIdentifiers;

class ProjectTest extends IntegrationTestCase
{
    /**
     * @covers \JiraSdk\Api\Client::getAllProjects
     */
    public function testGetAllProjects()
    {
        $client = $this->createClient();

        $projects = $client->getAllProjects();

        $this->assertIsArray($projects);
        $this->assertGreaterThan(0, \count($projects));
    }

    /**
     * @covers \JiraSdk\Api\Client::createProject
     * @covers \JiraSdk\Api\Client::deleteProject
     */
    public function testCreateProject()
    {
        $client = $this->createClient();
        $num = rand(0, 9999);
        $key = 'IT' . $num;

        $details = (new CreateProjectDetails())
            ->setKey($key)
            ->setName("Integration Test - {$num}")
            ->setDescription('This is a project created via an integration test')
            ->setProjectTypeKey('software')
            ->setLeadAccountId($this->getAccountId())
        ;

        $project = $client->createProject($details);

        $this->assertInstanceOf(ProjectIdentifiers::class, $project);
        $this->assertEquals($key, $project->getKey());

        $response = $client->deleteProject($key);

        $this->assertNull($response);
    }
}
