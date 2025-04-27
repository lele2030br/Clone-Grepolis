<?php
require_once 'db.php';

function produce_resources($city_id) {
    global $conn;
        $conn->query("UPDATE cities SET wood = wood + 10, stone = stone + 10, silver = silver + 5 WHERE id = $city_id");
        }

        function build($city_id, $building) {
            global $conn;
                $conn->query("INSERT INTO buildings (city_id, building_type) VALUES ($city_id, '$building')");
                }

                function train_troops($city_id, $troop_type, $quantity) {
                    global $conn;
                        $conn->query("INSERT INTO troops (city_id, troop_type, quantity) 
                            VALUES ($city_id, '$troop_type', $quantity)
                                ON DUPLICATE KEY UPDATE quantity = quantity + $quantity");
                                }

                                function attack($attacker_id, $defender_id) {
                                    global $conn;
                                        $result = rand(0, 1) ? 'Vitória' : 'Derrota';
                                            $conn->query("INSERT INTO battles (attacker_city, defender_city, result) VALUES ($attacker_id, $defender_id, '$result')");
                                            }
                                            ?>