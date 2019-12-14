<?php

use Illuminate\Database\Seeder;

class medicaFieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::select(DB::raw(
            "INSERT INTO `medical_fields` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Doctors', '2019-09-08 19:41:59', '2019-09-09 20:07:58', NULL),
(2, 'Dentists', '2019-09-09 20:28:24', '2019-09-09 20:28:24', NULL),
(3, 'Pharmacists', '2019-09-09 20:35:24', '2019-09-09 20:35:24', NULL),
(4, 'Laboratories', '2019-09-09 20:39:00', '2019-09-09 20:39:00', NULL),
(5, 'Nurses', '2019-09-09 20:43:06', '2019-09-09 20:43:06', NULL),
(6, 'Medical Technicians', '2019-09-09 20:55:35', '2019-09-09 20:55:35', NULL),
(7, 'Others', '2019-09-09 20:59:58', '2019-09-09 20:59:58', NULL);
"
        ));

    }
}
