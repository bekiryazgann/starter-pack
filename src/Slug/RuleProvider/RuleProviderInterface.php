<?php

namespace src\Slug\RuleProvider;

interface RuleProviderInterface
{
    /**
     * @param $ruleset
     *
     * @return array
     */
    public function getRules($ruleset): array;
}
