<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
// usamos la clase Factory
use Faker\Factory;

class InitSeeder extends Seeder
{
    public function run()
    {
        // use the factory to create a Faker\Generator instance
        $faker = Factory::create();
        // Declaramos un array que contendrá los datos
        $countries = [];

        for ($i = 0; $i < 15; $i++) {
            $created_at = $faker->dateTime();
            $updated_at = $faker->dateTimeBetween($created_at);
            $countries[] = [
                "name" => $faker->country,
                "created_at" => $created_at->format('Y-m-d H:i:s'),
                "updated_at" => $updated_at->format('Y-m-d H:i:s')
            ];
        }
        // d es como un vardump pero proporcionado por CI
        // d($countries);

        // Usando un query builder hacemos referencia a la tabla countries
        $builder = $this->db->table('countries');

        // Con el método insertBatch generamos un insert múltiple de un array
        $builder->insertBatch($countries);

        // Generamos los datos para la tabla groups
        $group = [
            [
                "name_group" => "admin",
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ], [
                "name_group" => "user",
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ]
        ];
        $builder = $this->db->table('groups');
        $builder->insertBatch($group);
    }
}
