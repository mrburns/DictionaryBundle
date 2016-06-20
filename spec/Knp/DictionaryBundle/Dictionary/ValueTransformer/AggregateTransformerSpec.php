<?php

namespace spec\Knp\DictionaryBundle\Dictionary\ValueTransformer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Knp\DictionaryBundle\Dictionary\ValueTransformer;

class AggregateTransformerSpec extends ObjectBehavior
{
    public function let(ValueTransformer $transformer1, ValueTransformer $transformer2)
    {
        $this->beConstructedWith([$transformer1, $transformer2]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Knp\DictionaryBundle\Dictionary\ValueTransformer\AggregateTransformer');
    }

    public function it_is_a_tranformer()
    {
        $this->shouldImplement('Knp\DictionaryBundle\Dictionary\ValueTransformer');
    }

    public function it_supports_the_value_if_at_least_one_transformer_supports_the_value($transformer1, $transformer2, $value)
    {
        $transformer1->supports($value)->willReturn(false);
        $transformer2->supports($value)->willReturn(false);

        $this->supports($value)->shouldReturn(false);

        $transformer1->supports($value)->willReturn(false);
        $transformer2->supports($value)->willReturn(true);

        $this->supports($value)->shouldReturn(true);
    }

    public function it_transform_the_value_with_other_transformer($transformer1, $transformer2, $value, $transformation)
    {
        $transformer1->supports($value)->willReturn(false);
        $transformer1->transform($value)->shouldNotBeCalled();

        $transformer2->supports($value)->willReturn(true);
        $transformer2->transform($value)->willReturn($transformation);

        $this->transform($value)->shouldReturn($transformation);
    }
}
