<?php

require_once __DIR__ . '/../UnitCategory.php';

class Energy extends UnitCategory
{
    protected string $name = 'Energy';
    protected string $baseUnit = 'joule';

    public function __construct()
    {
        $this->units = [
            'joule' => [
                'name' => 'joule',
                'abbrev' => 'J',
                'toBase' => 1
            ],
            'kilojoule' => [
                'name' => 'kilojoule',
                'abbrev' => 'kJ',
                'toBase' => 1000
            ],
            'megajoule' => [
                'name' => 'megajoule',
                'abbrev' => 'MJ',
                'toBase' => 1000000
            ],
            'calorie' => [
                'name' => 'calorie',
                'abbrev' => 'cal',
                'toBase' => 4.184
            ],
            'kilocalorie' => [
                'name' => 'kilocalorie',
                'abbrev' => 'kcal',
                'toBase' => 4184
            ],
            'wattHour' => [
                'name' => 'watt-hour',
                'abbrev' => 'Wh',
                'toBase' => 3600
            ],
            'kilowattHour' => [
                'name' => 'kilowatt-hour',
                'abbrev' => 'kWh',
                'toBase' => 3600000
            ],
            'electronvolt' => [
                'name' => 'electronvolt',
                'abbrev' => 'eV',
                'toBase' => 1.602176634e-19
            ],
            'btu' => [
                'name' => 'British thermal unit',
                'abbrev' => 'BTU',
                'toBase' => 1055.06
            ],
            'footPound' => [
                'name' => 'foot-pound',
                'abbrev' => 'ft路lbf',
                'toBase' => 1.3558179483314
            ]
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }
}
