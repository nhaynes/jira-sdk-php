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

class BulkProjectPermissionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\BulkProjectPermissions' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\BulkProjectPermissions' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\BulkProjectPermissions();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('issues', $data)) {
            $values = [];
            foreach ($data['issues'] as $value) {
                $values[] = $value;
            }
            $object->setIssues($values);
        }
        if (\array_key_exists('projects', $data)) {
            $values_1 = [];
            foreach ($data['projects'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setProjects($values_1);
        }
        if (\array_key_exists('permissions', $data)) {
            $values_2 = [];
            foreach ($data['permissions'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setPermissions($values_2);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('issues') && null !== $object->getIssues()) {
            $values = [];
            foreach ($object->getIssues() as $value) {
                $values[] = $value;
            }
            $data['issues'] = $values;
        }
        if ($object->isInitialized('projects') && null !== $object->getProjects()) {
            $values_1 = [];
            foreach ($object->getProjects() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['projects'] = $values_1;
        }
        $values_2 = [];
        foreach ($object->getPermissions() as $value_2) {
            $values_2[] = $value_2;
        }
        $data['permissions'] = $values_2;

        return $data;
    }
}
