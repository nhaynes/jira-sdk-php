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

class IssueFieldOptionConfigurationScopeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\IssueFieldOptionConfigurationScope' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\IssueFieldOptionConfigurationScope' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\IssueFieldOptionConfigurationScope();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('projects', $data)) {
            $values = [];
            foreach ($data['projects'] as $value) {
                $values[] = $value;
            }
            $object->setProjects($values);
            unset($data['projects']);
        }
        if (\array_key_exists('projects2', $data)) {
            $values_1 = [];
            foreach ($data['projects2'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Api\\Model\\ProjectScopeBean', 'json', $context);
            }
            $object->setProjects2($values_1);
            unset($data['projects2']);
        }
        if (\array_key_exists('global', $data)) {
            $object->setGlobal($this->denormalizer->denormalize($data['global'], 'JiraSdk\\Api\\Model\\IssueFieldOptionScopeBeanGlobal', 'json', $context));
            unset($data['global']);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
            }
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('projects') && null !== $object->getProjects()) {
            $values = [];
            foreach ($object->getProjects() as $value) {
                $values[] = $value;
            }
            $data['projects'] = $values;
        }
        if ($object->isInitialized('projects2') && null !== $object->getProjects2()) {
            $values_1 = [];
            foreach ($object->getProjects2() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['projects2'] = $values_1;
        }
        if ($object->isInitialized('global') && null !== $object->getGlobal()) {
            $data['global'] = $this->normalizer->normalize($object->getGlobal(), 'json', $context);
        }
        foreach ($object as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_2;
            }
        }

        return $data;
    }
}
