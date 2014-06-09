<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();
        $this->call('EmployeeTableSeeder');
    }
}

class EmployeeTableSeeder extends Seeder {
    public function run() {
        DB::table('employees')->delete();
        $first_names = [
            'James' => 'M', 'John' => 'M', 'Robert' => 'M', 'Michael' => 'M', 'William' => 'M', 'David' => 'M',
            'Richard' => 'M', 'Charles' => 'M', 'Joseph' => 'M', 'Thomas' => 'M', 'Mary' => 'F', 'Patricia' => 'F',
            'Linda' => 'F', 'Barbara' => 'F', 'Elizabeth' => 'F', 'Jennifer' => 'F', 'Maria' => 'F', 'Susan' => 'F',
            'Margaret' => 'F', 'Dorothy' => 'F'
        ];

        $last_names = [
            'Smith', 'Johnson', 'Williams', 'Jones', 'Brown', 'Davis', 'Miller', 'Wilson', 'Moore', 'Taylor'
        ];

        foreach ($first_names as $first_name => $gender) {
            foreach ($last_names as $last_name) {
                $employee = new Employee;
                $employee->first_name = $first_name;
                $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $employee->middle_initial = $letters{rand(0, 25)};
                $employee->last_name = $last_name;
                $employee->age = rand(18, 75);
                $employee->gender = $gender;
                $employee->save();
            }
        }
    }
}
