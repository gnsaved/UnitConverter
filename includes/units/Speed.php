<?php

require_once __DIR__ . '/../UnitCategory.php';

class Speed extends UnitCategory
{
    protected string $name = 'Speed';
    protected string $baseUnit = 'meterPerSecond';

    public function __construct()
    {
        $this->units = [
            'meterPerSecond' => [
                'name' => 'meter per second',
                'abbrev' => 'm/s',
                'toBase' => 1
            ],
            'kilometerPerHour' => [
                'name' => 'kilometer per hour',
                'abbrev' => 'km/h',
                'toBase' => 0.277777778
            ],
            'milePerHour' => [
                'name' => 'mile per hour',
                'abbrev' => 'mph',
                'toBase' => 0.44704
            ],
            'knot' => [
                'name' => 'knot',
                'abbrev' => 'kn',
                'toBase' => 0.514444444
            ],
            'footPerSecond' => [
                'name' => 'foot per second',
                'abbrev' => 'ft/s',
                'toBase' => 0.3048
            ],
            'mach' => [
                'name' => 'Mach (at sea level)',
                'abbrev' => 'Ma',
                'toBase' => 343
            ],
            'speedOfLight' => [
                'name' => 'speed of light',
                'abbrev' => 'c',
                'toBase' => 299792458
            ]
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }
}
