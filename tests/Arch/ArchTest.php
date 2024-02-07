<?php

Arch('App')
    ->expect('App')
    ->toUseStrictTypes();

Arch('App\UseCases\ExportRegistration\Dtos')
    ->expect('App\UseCases\ExportRegistration\Dtos')
    ->toUseStrictTypes()
    ->toBeClasses()
    ->toBeReadonly()
    ->not->toHaveSuffix('Dto');
