<?php
/**
 * Copyright (c) 2019 Moritz Walter
 * All rights reserved.
 *
 * File created on 18.11.2019 at 15:30
 */

namespace HMCSW\ThemeManager;


class theme
{
    public function gettheme($pdo)
    {
        $statement = $pdo->prepare("SELECT * FROM theme WHERE active = ? LIMIT 1");
        $statement->execute(array());
        while ($row = $statement->fetch()) {
            return $row['name'];
        }
    }
}