<?php

namespace spec\Knp\DictionaryBundle\Validator\Constraints;

use PhpSpec\ObjectBehavior;

class DictionarySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(['name' => 'yolo']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Knp\DictionaryBundle\Validator\Constraints\Dictionary');
    }

    function it_adds_default_values()
    {
        $this->name->shouldReturn('yolo');
        $this->validatedBy()->shouldReturn('knp_dictionary.dictionary_validator');
    }
}
