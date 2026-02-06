<?php

require_once __DIR__ . '/../UnitCategory.php';

class DataStorage extends UnitCategory
{
    protected string $name = 'Data Storage';
    protected string $baseUnit = 'byte';

    public function __construct()
    {
        $this->units = [
            'bit' => [
                'name' => 'bit',
                'abbrev' => 'b',
                'toBase' => 0.125
            ],
            'byte' => [
                'name' => 'byte',
                'abbrev' => 'B',
                'toBase' => 1
            ],
            'kilobyte' => [
                'name' => 'kilobyte',
                'abbrev' => 'KB',
                'toBase' => 1024
            ],
            'megabyte' => [
                'name' => 'megabyte',
                'abbrev' => 'MB',
                'toBase' => 1048576
            ],
            'gigabyte' => [
                'name' => 'gigabyte',
                'abbrev' => 'GB',
                'toBase' => 1073741824
            ],
            'terabyte' => [
                'name' => 'terabyte',
                'abbrev' => 'TB',
                'toBase' => 1099511627776
            ],
            'petabyte' => [
                'name' => 'petabyte',
                'abbrev' => 'PB',
                'toBase' => 1125899906842624
            ],
            'kibibyte' => [
                'name' => 'kibibyte',
                'abbrev' => 'KiB',
                'toBase' => 1024
            ],
            'mebibyte' => [
                'name' => 'mebibyte',
                'abbrev' => 'MiB',
                'toBase' => 1048576
            ],
            'gibibyte' => [
                'name' => 'gibibyte',
                'abbrev' => 'GiB',
                'toBase' => 1073741824
            ]
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }
}
