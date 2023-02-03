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

class RichTextNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\RichText' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\RichText' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\RichText();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('finalised', $data)) {
            $object->setFinalised($data['finalised']);
            unset($data['finalised']);
        }
        if (\array_key_exists('valueSet', $data)) {
            $object->setValueSet($data['valueSet']);
            unset($data['valueSet']);
        }
        if (\array_key_exists('emptyAdf', $data)) {
            $object->setEmptyAdf($data['emptyAdf']);
            unset($data['emptyAdf']);
        }
        if (\array_key_exists('empty', $data)) {
            $object->setEmpty($data['empty']);
            unset($data['empty']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
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
        if ($object->isInitialized('finalised') && null !== $object->getFinalised()) {
            $data['finalised'] = $object->getFinalised();
        }
        if ($object->isInitialized('valueSet') && null !== $object->getValueSet()) {
            $data['valueSet'] = $object->getValueSet();
        }
        if ($object->isInitialized('emptyAdf') && null !== $object->getEmptyAdf()) {
            $data['emptyAdf'] = $object->getEmptyAdf();
        }
        if ($object->isInitialized('empty') && null !== $object->getEmpty()) {
            $data['empty'] = $object->getEmpty();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
