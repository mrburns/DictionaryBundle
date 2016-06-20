<?php

namespace Knp\DictionaryBundle\Dictionary\ValueTransformer;

use Knp\DictionaryBundle\Dictionary\ValueTransformer;

class AggregateTransformer implements ValueTransformer
{
    /**
     * @var ValueTransformer[]
     */
    private $transformers;

    /**
     * @param ValueTransformer[] $transformers
     */
    public function __construct(array $transformers)
    {
        foreach ($transformers as $transformer) {
            $this->addTransformer($transformer);
        }
    }

    /**
     * @param ValueTransformer $transformer
     */
    public function addTransformer(ValueTransformer $transformer)
    {
        $this->transformers[] = $transformer;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($value)
    {
        foreach ($this->transformers as $transformer) {
            if ($transformer->supports($value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($value)
    {
        foreach ($this->transformers as $transformer) {
            if (true === $transformer->supports($value)) {
                return $transformer->transform($value);
            }
        }

        return $value;
    }
}
