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

namespace JiraSdk\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use JiraSdk\Api\Runtime\Normalizer\CheckArray;
use JiraSdk\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ConfigurationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\Configuration' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\Configuration' === \get_class($data);
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \JiraSdk\Api\Model\Configuration();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('votingEnabled', $data)) {
            $object->setVotingEnabled($data['votingEnabled']);
        }
        if (\array_key_exists('watchingEnabled', $data)) {
            $object->setWatchingEnabled($data['watchingEnabled']);
        }
        if (\array_key_exists('unassignedIssuesAllowed', $data)) {
            $object->setUnassignedIssuesAllowed($data['unassignedIssuesAllowed']);
        }
        if (\array_key_exists('subTasksEnabled', $data)) {
            $object->setSubTasksEnabled($data['subTasksEnabled']);
        }
        if (\array_key_exists('issueLinkingEnabled', $data)) {
            $object->setIssueLinkingEnabled($data['issueLinkingEnabled']);
        }
        if (\array_key_exists('timeTrackingEnabled', $data)) {
            $object->setTimeTrackingEnabled($data['timeTrackingEnabled']);
        }
        if (\array_key_exists('attachmentsEnabled', $data)) {
            $object->setAttachmentsEnabled($data['attachmentsEnabled']);
        }
        if (\array_key_exists('timeTrackingConfiguration', $data)) {
            $object->setTimeTrackingConfiguration($this->denormalizer->denormalize($data['timeTrackingConfiguration'], 'JiraSdk\\Api\\Model\\ConfigurationTimeTrackingConfiguration', 'json', $context));
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return [];
    }
}
