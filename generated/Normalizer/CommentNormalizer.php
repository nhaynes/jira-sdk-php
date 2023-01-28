<?php

namespace JiraSdk\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use JiraSdk\Runtime\Normalizer\CheckArray;
use JiraSdk\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CommentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === 'JiraSdk\\Model\\Comment';
    }
    public function supportsNormalization($data, $format = null): bool
    {
        return is_object($data) && get_class($data) === 'JiraSdk\\Model\\Comment';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \JiraSdk\Model\Comment();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('self', $data)) {
            $object->setSelf($data['self']);
            unset($data['self']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        if (\array_key_exists('author', $data)) {
            $object->setAuthor($this->denormalizer->denormalize($data['author'], 'JiraSdk\\Model\\CommentAuthor', 'json', $context));
            unset($data['author']);
        }
        if (\array_key_exists('body', $data)) {
            $object->setBody($data['body']);
            unset($data['body']);
        }
        if (\array_key_exists('renderedBody', $data)) {
            $object->setRenderedBody($data['renderedBody']);
            unset($data['renderedBody']);
        }
        if (\array_key_exists('updateAuthor', $data)) {
            $object->setUpdateAuthor($this->denormalizer->denormalize($data['updateAuthor'], 'JiraSdk\\Model\\CommentUpdateAuthor', 'json', $context));
            unset($data['updateAuthor']);
        }
        if (\array_key_exists('created', $data)) {
            $object->setCreated(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['created']));
            unset($data['created']);
        }
        if (\array_key_exists('updated', $data)) {
            $object->setUpdated(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['updated']));
            unset($data['updated']);
        }
        if (\array_key_exists('visibility', $data)) {
            $object->setVisibility($this->denormalizer->denormalize($data['visibility'], 'JiraSdk\\Model\\CommentVisibility', 'json', $context));
            unset($data['visibility']);
        }
        if (\array_key_exists('jsdPublic', $data)) {
            $object->setJsdPublic($data['jsdPublic']);
            unset($data['jsdPublic']);
        }
        if (\array_key_exists('jsdAuthorCanSeeRequest', $data)) {
            $object->setJsdAuthorCanSeeRequest($data['jsdAuthorCanSeeRequest']);
            unset($data['jsdAuthorCanSeeRequest']);
        }
        if (\array_key_exists('properties', $data)) {
            $values = array();
            foreach ($data['properties'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'JiraSdk\\Model\\EntityProperty', 'json', $context);
            }
            $object->setProperties($values);
            unset($data['properties']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('body') && null !== $object->getBody()) {
            $data['body'] = $object->getBody();
        }
        if ($object->isInitialized('visibility') && null !== $object->getVisibility()) {
            $data['visibility'] = $this->normalizer->normalize($object->getVisibility(), 'json', $context);
        }
        if ($object->isInitialized('properties') && null !== $object->getProperties()) {
            $values = array();
            foreach ($object->getProperties() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['properties'] = $values;
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
}
