<?php

require_once __DIR__ . '/../UnitCategory.php';

class Time extends UnitCategory
{
    protected string $name = 'Time';
    protected string $baseUnit = 'second';

    public function __construct()
    {
        $this->units = [
            'second' => [
                'name' => 'second',
                'abbrev' => 's',
                'toBase' => 1
            ],
            'millisecond' => [
                'name' => 'millisecond',
                'abbrev' => 'ms',
                'toBase' => 0.001
            ],
            'microsecond' => [
                'name' => 'microsecond',
                'abbrev' => 'μs',
                'toBase' => 0.000001
            ],
            'minute' => [
                'name' => 'minute',
                'abbrev' => 'min',
                'toBase' => 60
            ],
            'hour' => [
                'name' => 'hour',
                'abbrev' => 'hr',
                'toBase' => 3600
            ],
            'day' => [
                'name' => 'day',
                'abbrev' => 'd',
                'toBase' => 86400
            ],
            'week' => [
                'name' => 'week',
                'abbrev' => 'wk',
                'toBase' => 604800
            ],
            'month' => [
                'name' => 'month (30 days)',
                'abbrev' => 'mo',
                'toBase' => 2592000
            ],
            'year' => [
                'name' => 'year (365 days)',
                'abbrev' => 'yr',
                'toBase' => 31536000
            ],
            'decade' => [
                'name' => 'decade',
                'abbrev' => 'dec',
                'toBase' => 315360000
            ]
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }
}
