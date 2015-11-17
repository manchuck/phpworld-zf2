<?php

namespace Album\View\Helper;

use Zend\View\Helper\AbstractHelper;

class RandomQuote extends AbstractHelper
{
    protected $quotes = [
        "Trillian is one of the least benightedly unintelligent life forms it has been my profound lack of pleasure not to be able to avoid meeting.",
        "Sadly, however, before she could get to a phone to tell anyone about it, a terribly stupid catastrophe occurred, and the idea was lost forever",
        "Is there any tea on this spaceship?",
        "For instance, the first phase is characterized by the question How can we eat? the second by the question Why do we eat? and the third by the question Where shall we have lunch?",
        "Time is an illusion, lunch time doubly so"
    ];

    public function __invoke()
    {
        return $this->quotes[mt_rand(0, count($this->quotes) - 1)];
    }
}
