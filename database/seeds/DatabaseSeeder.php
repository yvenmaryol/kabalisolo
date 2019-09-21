<?php

use App\City;
use App\Like;
use App\User;
use App\Image;
use App\Profil;
use App\Annonce;
use App\Country;
use App\Message;
use App\Category;
use App\Subcategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class, 10)->create();
        factory(Category::class, 10)->create();
        factory(Subcategory::class, 20)->create();
        factory(Country::class, 4)->create();
        factory(City::class, 20)->create();
        factory(Annonce::class, 50)->create();
        factory(Image::class, 150)->create();
        factory(Profil::class, 10)->create();
        factory(Like::class, 15)->create();
        factory(Message::class, 130)->create();
    }
}
