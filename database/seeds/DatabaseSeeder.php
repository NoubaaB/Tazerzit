<?php

use App\User;
use App\Drink;
use App\Table;
use App\Header;
use App\Hostel;
use App\Social;
use App\Dessert;
use App\Info;
use App\Starter;
use App\Maindish;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        User::create([
            'name' => 'Admin',
            'email' => 'RestaurantTazerzit@gmail.com',
            'password' => Hash::make('t@zerzit123'),
        ]);
        Header::create([
            'image' => 'images/bg_1.jpg',
            'subheading' => 'Welcome',
            'body' => 'Creamy Hot and Ready to Serve',
            'footer' => 'A small town named Taghazout , Overlooking the sea , flows by love and supplies it with the necessary serenity.',
        ]);

        Header::create([
            'image' => 'images/bg_2.jpg',
            'subheading' => 'Welcome',
            'body' => 'Amazing Taste Beautiful Place',
            'footer' => 'A small town named Taghazout , Overlooking the sea , flows by love and supplies it with the necessary serenity.',
        ]);

        Header::create([
            'image' => 'images/bg_3.jpg',
            'subheading' => 'Welcome',
            'body' => 'Creamy Hot and Ready to Serve',
            'footer' => 'A small town named Taghazout , Overlooking the sea , flows by love and supplies it with the necessary serenity.',
        ]);

        Social::create([
            "nom" => 'facebook',
            "link" => 'http://www.facebook.com/',
        ]);

        Social::create([
            "nom" => 'instagram',
            "link" => 'http://www.instagram.com/',
        ]);
        Social::create([
            "nom" => 'hotel',
            "link" => 'http://www.twitter.com/',
        ]);

        Starter::create([
            "nom" => "Cornish - Mackerel",
            "prix" => "20.00",
            "description" => "tasty and delicious",
            "image" => "images/dish-1.jpg",
        ]);
        Starter::create([
            "nom" => "Roasted Steak",
            "prix" => "29.00",
            "description" => "tasty and delicious",
            "image" => "images/dish-2.jpg",
        ]);
        Starter::create([
            "nom" => "Seasonal Soup",
            "prix" => "20.00",
            "description" => "tasty and delicious",
            "image" => "images/dish-3.jpg",
        ]);
        Starter::create([
            "nom" => "Chicken Curry",
            "prix" => "20.00",
            "description" => "tasty and delicious",
            "image" => "images/dish-4.jpg",
        ]);


        Maindish::create([
            "nom" => "Sea Trout",
            "prix" => "49.91",
            "description" => "tasty and delicious",
            "image" => "images/dish-5.jpg",
        ]);
        Maindish::create([
            "nom" => "Roasted Beef",
            "prix" => "20.00",
            "description" => "tasty and delicious",
            "image" => "images/dish-6.jpg",
        ]);
        Maindish::create([
            "nom" => "Butter Fried Chicken",
            "prix" => "20.00",
            "description" => "tasty and delicious",
            "image" => "images/dish-7.jpg",
        ]);
        Maindish::create([
            "nom" => "Chiken Filet",
            "prix" => "20.00",
            "description" => "tasty and delicious",
            "image" => "images/dish-8.jpg",
        ]);


        Dessert::create([
            "nom" => "Cornish - Mackerel",
            "prix" => "20.00",
            "description" => "tasty and delicious",
            "image" => "images/dessert-1.jpg",
        ]);
        Dessert::create([
            "nom" => "Roasted Steak",
            "prix" => "29.00",
            "description" => "tasty and delicious",
            "image" => "images/dessert-2.jpg",
        ]);
        Dessert::create([
            "nom" => "Seasonal Soup",
            "prix" => "20.00",
            "description" => "tasty and delicious",
            "image" => "images/dessert-3.jpg",
        ]);
        Dessert::create([
            "nom" => "Chicken Curry",
            "prix" => "20.00",
            "description" => "tasty and delicious",
            "image" => "images/dessert-4.jpg",
        ]);


        Drink::create([
            "nom" => "Sea Trout",
            "prix" => "49.91",
            "description" => "tasty and delicious",
            "image" => "images/drink-5.jpg",
        ]);
        Drink::create([
            "nom" => "Roasted Beef",
            "prix" => "20.00",
            "description" => "tasty and delicious",
            "image" => "images/drink-6.jpg",
        ]);
        Drink::create([
            "nom" => "Butter Fried Chicken",
            "prix" => "20.00",
            "description" => "tasty and delicious",
            "image" => "images/drink-7.jpg",
        ]);
        Drink::create([
            "nom" => "Chiken Filet",
            "prix" => "20.00",
            "description" => "tasty and delicious",
            "image" => "images/drink-8.jpg",
        ]);
        Drink::create([
            "nom" => "Coffe",
            "prix" => "20.00",
            "description" => "Chocolate Coffe",
            "image" => "images/menu-1.jpg",
        ]);
        Drink::create([
            "nom" => "Coffe",
            "prix" => "20.00",
            "description" => "Chocolate Coffe",
            "image" => "images/menu-2.jpg",
        ]);
        Drink::create([
            "nom" => "Coffe",
            "prix" => "20.00",
            "description" => "Chocolate Coffe",
            "image" => "images/menu-3.jpg",
        ]);
        Drink::create([
            "nom" => "Coffe",
            "prix" => "20.00",
            "description" => "Chocolate Coffe",
            "image" => "images/menu-4.jpg",
        ]);

        Table::create([
            'fname' => 'first name',
            'lname' => 'last name',
            'date' => date("Y/m/d"),
            'time' => "08:00pm",
            'phone' => '0625483621',
            'message' => "lorim long test message",
        ]);

        //create Hostel FIRST
        factory(\App\Hostel::class, 1)->create(['image' => 'images/181.JPG']);
        factory(\App\Hostel::class, 1)->create(['image' => 'images/171.JPG']);
        factory(\App\Hostel::class, 1)->create(['image' => 'images/096.JPG']);
        factory(\App\Hostel::class, 1)->create(['image' => 'images/172.JPG']);

        factory(\App\Activitie::class, 5)->create(['hostel_id' => 1]);
        factory(\App\Activitie::class, 5)->create(['hostel_id' => 2]);
        factory(\App\Activitie::class, 5)->create(['hostel_id' => 3]);
        factory(\App\Activitie::class, 5)->create(['hostel_id' => 4]);

        factory(\App\Image::class, 1)->create(['hostel_id' => 1, 'image' => 'images/181.JPG']);
        factory(\App\Image::class, 1)->create(['hostel_id' => 1, 'image' => 'images/177.JPG']);

        factory(\App\Image::class, 1)->create(['hostel_id' => 2, 'image' => 'images/171.JPG']);
        factory(\App\Image::class, 1)->create(['hostel_id' => 2, 'image' => 'images/172.JPG']);
        factory(\App\Image::class, 1)->create(['hostel_id' => 2, 'image' => 'images/176.JPG']);

        factory(\App\Image::class, 1)->create(['hostel_id' => 3, 'image' => 'images/096.JPG']);
        factory(\App\Image::class, 1)->create(['hostel_id' => 3, 'image' => 'images/110.JPG']);
        factory(\App\Image::class, 1)->create(['hostel_id' => 3, 'image' => 'images/anas.JPG']);

        factory(\App\Image::class, 3)->create(['hostel_id' => 4, 'image' => 'images/172.JPG']);

        Info::create([
            'phone' => '+212 613128843',
            'email' => 'Tazerzit@gmail.com',
            'adress' => 'Restaurant Tazerzit, Taghazout, Morocco (MA)',
            'openDays' => 'Open All Days',
            'time' => '8:00am - 12:00pm',
            'phoneText' => 'Hostel, Beach & Surfing Schools, Check our Hostel Packs for More Info and Booking',
            'menu' => "Moroccan cuisine is the culinary star of North Africa. Imperial and trade influence has been filtered and blended into Morocco's culture. Being at the crossroads of many civilizations, the cuisine of Morocco is a mélange of Arab, Berber, Moorish, French, Middle Eastern, Mediterranean African, Iberian, and Jewish influences. Moroccan cooking is enhanced with fruits, dried and fresh -- apricots, dates, figs, and raisins, to name a few. Lemons preserved in a salt-lemon juice mixture bring a unique face to many Moroccan chicken and pigeon dishes. Nuts are prominent; pine nuts, almonds, and pistachios show up in all sorts of unexpected places. Moroccan sweets are rich and dense confections of cinnamon, almond, and fruit perfumes that are rolled in filo dough, soaked in honey, and stirred into puddings.",
            'story' => 'A few kilometres away from Agadir, there is a beach with a small islet known to all surfers as Devil’s rock. When you ask surfers about it, they would tell you it is a safe spot to learn and improve surfing levels. When you ask locals, it is a whole other story! An old Superstition passed down from generation to generation is still around, and devil’s Rock is not only a surf spot; it holds a mind-boggling belief..',
            'location' => 'Restaurant Tazerzit , Taghazout, Morocco',
            'about' => 'A few kilometres away from Agadir, there is a beach with a small islet known to all surfers as Devil’s rock. When you ask surfers about it, they would tell you it is a safe spot to learn and improve surfing levels.',
        ]);
    }
}
