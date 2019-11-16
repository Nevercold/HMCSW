<?php
/**
 * Copyright (c) 2019 Moritz Walter
 * All rights reserved.
 *
 * File created on 16.11.2019 at 19:38
 */
include __DIR__ . '../system/load.php';
$pwgenerator
    ->setLength(20)
    ->setOptionValue(RequirementPasswordGenerator::OPTION_UPPER_CASE, true)
    ->setOptionValue(RequirementPasswordGenerator::OPTION_LOWER_CASE, true)
    ->setOptionValue(RequirementPasswordGenerator::OPTION_NUMBERS, true)
    ->setOptionValue(RequirementPasswordGenerator::OPTION_SYMBOLS, true)
    ->setMinimumCount(RequirementPasswordGenerator::OPTION_UPPER_CASE, 4)
    ->setMinimumCount(RequirementPasswordGenerator::OPTION_LOWER_CASE, 4)
    ->setMinimumCount(RequirementPasswordGenerator::OPTION_NUMBERS, 4)
    ->setMinimumCount(RequirementPasswordGenerator::OPTION_SYMBOLS, 4)
    ->setParameter(RequirementPasswordGenerator::PARAMETER_SYMBOLS, '!@#$%^&*?_~');
$pw = $pwgenerator->generatePassword();

echo $pw;

