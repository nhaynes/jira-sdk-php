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

class ConvertedJQLQueriesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'JiraSdk\\Api\\Model\\ConvertedJQLQueries' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'JiraSdk\\Api\\Model\\ConvertedJQLQueries' === \get_class($data);
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
        $object = new \JiraSdk\Api\Model\ConvertedJQLQueries();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('queryStrings', $data)) {
            $values = [];
            foreach ($data['queryStrings'] as $value) {
                $values[] = $value;
            }
            $object->setQueryStrings($values);
        }
        if (\array_key_exists('queriesWithUnknownUsers', $data)) {
            $values_1 = [];
            foreach ($data['queriesWithUnknownUsers'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'JiraSdk\\Api\\Model\\JQLQueryWithUnknownUsers', 'json', $context);
            }
            $object->setQueriesWithUnknownUsers($values_1);
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('queryStrings') && null !== $object->getQueryStrings()) {
            $values = [];
            foreach ($object->getQueryStrings() as $value) {
                $values[] = $value;
            }
            $data['queryStrings'] = $values;
        }
        if ($object->isInitialized('queriesWithUnknownUsers') && null !== $object->getQueriesWithUnknownUsers()) {
            $values_1 = [];
            foreach ($object->getQueriesWithUnknownUsers() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['queriesWithUnknownUsers'] = $values_1;
        }

        return $data;
    }
}
