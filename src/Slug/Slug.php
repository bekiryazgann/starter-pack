<?php

namespace src\Slug;

use src\Slug\RuleProvider\DefaultRuleProvider;
use src\Slug\RuleProvider\RuleProviderInterface;

class Slug
{
    const LOWERCASE_NUMBERS_DASHES = '/[^A-Za-z0-9]+/';

    /**
     * @var array
     */
    protected array $rules = [];

    /**
     * @var \src\Slug\RuleProvider\RuleProviderInterface|\src\Slug\RuleProvider\DefaultRuleProvider
     */
    protected RuleProviderInterface|DefaultRuleProvider $provider;

    /**
     * @var array
     */
    protected array $options = [
        'regexp' => self::LOWERCASE_NUMBERS_DASHES,
        'separator' => '-',
        'lowercase' => true,
        'lowercase_after_regexp' => false,
        'trim' => true,
        'strip_tags' => false,
        'rulesets' => [
            'default',
            'armenian',
            'azerbaijani',
            'burmese',
            'hindi',
            'georgian',
            'norwegian',
            'vietnamese',
            'ukrainian',
            'latvian',
            'finnish',
            'greek',
            'czech',
            'arabic',
            'slovak',
            'turkish',
            'polish',
            'german',
            'russian',
            'romanian',
        ],
    ];

    public static self $instance;

    public static function getInstance(): self
    {
        if (! isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param array $options
     * @param \src\Slug\RuleProvider\RuleProviderInterface|null $provider
     */
    public function __construct(array $options = [], RuleProviderInterface $provider = null)
    {
        if (count($options) == 0) {
            $options = [
                "rulesets" => [
                    "default",
                    "turkish",
                ],
            ];
        }
        $this->options = array_merge($this->options, $options);
        $this->provider = $provider ? $provider : new DefaultRuleProvider();

        foreach ($this->options['rulesets'] as $ruleSet) {
            $this->activateRuleSet($ruleSet);
        }
    }

    /**
     * @param string $string
     * @param array|string|null $options
     *
     * @return array|false|string|string[]|null
     */
    public function slugify(string $string, array|string $options = null): array|bool|string|null
    {
        // BC: the second argument used to be the separator
        if (is_string($options)) {
            $separator = $options;
            $options = [];
            $options['separator'] = $separator;
        }

        $options = array_merge($this->options, (array) $options);

        if (isset($options['ruleset'])) {
            $rules = array_merge($this->rules, $this->provider->getRules($options['ruleset']));
        } else {
            $rules = $this->rules;
        }

        $string = ($options['strip_tags'])
            ? strip_tags($string)
            : $string;

        $string = strtr($string, $rules);
        unset($rules);

        if ($options['lowercase'] && ! $options['lowercase_after_regexp']) {
            $string = mb_strtolower($string);
        }

        $string = preg_replace($options['regexp'], $options['separator'], $string);

        if ($options['lowercase'] && $options['lowercase_after_regexp']) {
            $string = mb_strtolower($string);
        }

        return ($options['trim'])
            ? trim($string, $options['separator'])
            : $string;
    }

    /**
     * @param $character
     * @param $replacement
     *
     * @return $this
     */
    public function addRule($character, $replacement): static
    {
        $this->rules[$character] = $replacement;

        return $this;
    }

    /**
     * @param array $rules
     *
     * @return $this
     */
    public function addRules(array $rules): static
    {
        foreach ($rules as $character => $replacement) {
            $this->addRule($character, $replacement);
        }

        return $this;
    }

    /**
     * @param $ruleSet
     *
     * @return $this
     */
    public function activateRuleSet($ruleSet): static
    {
        return $this->addRules($this->provider->getRules($ruleSet));
    }

    /**
     * @param array $options
     *
     * @return static
     */
    public static function create(array $options = []): static
    {
        return new static($options);
    }
}
