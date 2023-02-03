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

class ProjectTest extends IntegrationTestCase
{
    public function testCreateProject()
    {
        $client = $this->createClient();

        $response = $client->createProject(new CreateProjectDetails([
            'key' => 'IT',
            'name' => 'Integration Test',
            'description' => 'This is a project created via an integration test',
            'projectTypeKey' => 'software',
        ]));

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertInstanceOf(ProjectIdentifiers::class, $response);
        $this->assertEquals('IT', $response->getKey());
    }

    /**
     * @depends testCreateProject
     */
    public function testDeleteProject()
    {
        $client = $this->createClient();

        $response = $client->deleteProject('IT');

        $this->assertEquals(204, $response->getStatusCode());
    }
}
