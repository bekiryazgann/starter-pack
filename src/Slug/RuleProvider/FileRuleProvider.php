<?php


namespace src\Slug\RuleProvider;

class FileRuleProvider
{
    /**
     * @var string
     */
    protected string $directoryName;

    /**
     * @param $directoryName
     */
    public function __construct($directoryName)
    {
        $this->directoryName = $directoryName;
    }

    /**
     * @param $ruleset
     *
     * @return array
     */
    public function getRules($ruleset): array
    {
        $fileName = $this->directoryName.DIRECTORY_SEPARATOR.$ruleset.'.json';

        return json_decode(file_get_contents($fileName), true);
    }
}
