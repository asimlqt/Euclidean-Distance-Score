<?php
/*
 * Copyright (C) 2012 Asim Liaquat
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *                               
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>. 
 */

function euclidean_distance_score($prefs, $person1, $person2) {

    if(!array_key_exists($person1, $prefs) || !array_key_exists($person2, $prefs))
        return 0;

    if(count(array_intersect_key($prefs[$person1], $prefs[$person2])) === 0) 
        return 0;

    $sumOfSquares = 0;
    foreach($prefs[$person1] as $item => $value) {
        if(array_key_exists($item, $prefs[$person2])) {
            $sumOfSquares += pow($value - $prefs[$person2][$item], 2);
        }
    }

    return 1/(1+$sumOfSquares);

}

/*

// Example

$reviews = array(
    'Tania Diede' => array(
        'The Mozart Conspiracy' => 3.0,
        'The Cross (Vampire Federation 2)' => 3.5,
        'The Doomsday Prophecy' => 3.0,
        'The Lost Symbol' => 4.5,
        'The Da Vinci Code' => 5.0
    ),
    'Allan Rhein' => array(
        'The Mozart Conspiracy' => 1.5,
        'The Cross (Vampire Federation 2)' => 4.0,
        'The Doomsday Prophecy' => 1.0,
        'The Lost Symbol' => 4.5,
        'The Da Vinci Code' => 4.0
    ),
    'Lorrie Schisler' => array(
        'The Mozart Conspiracy' => 1.0,
        'The Cross (Vampire Federation 2)' => 2.5,
        'The Doomsday Prophecy' => 3.0,
        'The Lost Symbol' => 3.5,
        'The Da Vinci Code' => 3.0
    ),
    'Dollie Massengill' => array(
        'The Mozart Conspiracy' => 2.0,
        'The Doomsday Prophecy' => 3.0,
        'The Lost Symbol' => 3.5,
        'The Da Vinci Code' => 3.0
    )
);

echo euclidean_distance_score($reviews, 'Tania Diede', 'Allan Rhein');
 */
