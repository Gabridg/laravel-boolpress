<?php


use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $new_user = new User();
        $new_user->name = 'gabrieledg';
        $new_user->email = 'gabri99.del@gmial.ocm';
        $new_user->password = bcrypt("password");

        $new_user->save();

        for($i = 0; $i < 9; $i++)
        {
            $new_user = new User();
            $new_user->name = $faker->userName();
            $new_user->email = $faker->safeEmail();
            $new_user->password = bcrypt($faker->password());
            
            $new_user->save();
        }
    }
}
