<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

use App\Models\Restaurant;

use App\Models\Dish;

use Illuminate\Support\Facades\Storage;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Schema::withoutForeignKeyConstraints(function () {

            Dish::truncate();

            

        });

        storage::deleteDirectory('uploads/images/');
        storage::makeDirectory('uploads/images/');


        $dishes = [
            [
                'name' => 'hamburger',
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrt1EInzip1NZ71yE0yKJ99ZtDqzzO-7iqtw&usqp=CAU',
            ], 
            [
                'name' => 'healthy-bowl',
                'img' => 'https://thehappypear.ie/wp-content/uploads/2021/09/IMG_4780-2048x2048.jpg',
            ], 
            [
                'name' => 'gamberi alla griglia',
                'img' => 'https://media-cdn.tripadvisor.com/media/photo-s/15/9e/05/d1/grilled-prawn.jpg',
            ], 
            [
                'name' => 'spaghetti alla nerano',
                'img' => 'https://www.giallozafferano.it/images/232-23249/Spaghetti-alla-Nerano_450x300.jpg',
            ], 
            [
                'name' => 'special 1',
                'img' => 'https://cdn.images.ondaplatform.com/portals_articles/1110/gallery/P1030749-XL.jpg?crop=smart&mt=1674553138&width=420&height=280&format=jpeg',
            ], 
            [
                'name' => 'special 2',
                'img' => 'https://northernvirginiamag.com/wp-content/uploads/2022/10/2941cover.jpg',
            ], 
            [
                'name' => 'pizza gitana',
                'img' => 'https://media-cdn.tripadvisor.com/media/photo-p/17/06/96/ca/mixed-peppers-olives.jpg',
            ], 
            [
                'name' => 'sushi mix',
                'img' => 'https://www.ciboserio.it/wp-content/uploads/2019/08/salmone-sushi.jpg',
            ], 
            [
                'name' => 'juicy meat',
                'img' => 'https://www.mashed.com/img/gallery/2-ways-to-tell-if-your-meat-is-cooked-without-cutting-it/-1484683588.jpg',
            ], 
            [
                'name' => 'chapati and chicken',
                'img' => 'https://veerji.ca/wp-content/uploads/2022/02/Chicken-Tikka-Masala.jpeg',
            ], 
            [
                'name' => 'pizza capricciosa',
                'img' => 'https://wips.plug.it/cips/buonissimo.org/cms/2019/04/pizza-capricciosa.jpg?w=713&a=c&h=407',
            ], 
            [
                'name' => 'spaghetti alla piastra',
                'img' => 'https://blog.giallozafferano.it/trasentieriefornelli/wp-content/uploads/2022/03/IMG_0019-1-1536x1024.jpg',
            ], 
            [
                'name' => 'sashimi sake',
                'img' => 'https://www.miyosushi.it/wp-content/uploads/2019/08/64.jpg',
            ], 
            [
                'name' => 'roastbeef',
                'img' => 'https://blog.giallozafferano.it/albe/wp-content/uploads/2020/08/2AD4F035-474E-4DF6-9320-F6B693D89AC0.jpg',
            ], 
            [
                'name' => 'hamburger di chianina',
                'img' => 'https://shop.eismann.it/upload/product-detail-theme/it/33055-hamburger-di-razza-chianina-K-20211022.jpg',
            ], 
            [
                'name' => 'curry chicken',
                'img' => 'https://i2.wp.com/lifemadesimplebakes.com/wp-content/uploads/2018/11/Yellow-Coconut-Curry-1.jpg',
            ], 
            [
                'name' => 'tuna tartare',
                'img' => 'https://pinchandswirl.com/wp-content/uploads/2022/12/Tuna-Tartare.jpg',
            ], 
            [
                'name' => 'pizza margherita',
                'img' => 'https://images.prismic.io/eataly-us/ed3fcec7-7994-426d-a5e4-a24be5a95afd_pizza-recipe-main.jpg?auto=compress,format',
            ], 
            [
                'name' => 'cheese fries',
                'img' => 'https://www.thegunnysack.com/wp-content/uploads/2022/11/Cheese-Fries-Topdown.jpg',
            ], 
            [
                'name' => 'onion rings',
                'img' => 'https://thecozycook.com/wp-content/uploads/2021/05/Onion-Rings-Recipe-1.1jpg-1.jpg',
            ], 
        
        ];

        for ($i=0; $i < 60; $i++) { 

            $randomRestaurant = Restaurant::inRandomOrder()->first();
                
                $imagePath=null;
            // if(isset($dishes[rand(0, count($dishes)-1)]['img']))
            // {

                $dishes_random_number = rand(0, count($dishes)-1);
                $dishImgPath = $dishes[$dishes_random_number]['img'];
    
                $imgContent = file_get_contents($dishImgPath);              
                $newImagePath = storage_path('app/public/uploads/images');             
                $newImageName = rand(1000, 9999).'-'.rand(1000, 9999).'-'.rand(1000, 9999).'.png';             
                $fullNewImagePath = $newImagePath.'/'.$newImageName;              
                file_put_contents($fullNewImagePath, $imgContent); 
                
                $imagePath='uploads/images/'.$newImageName;
            // // }

            

            $name = $dishes[$dishes_random_number]['name'];

            $random_number = rand(1,6);

            Dish::create([

                'restaurant_id' => $randomRestaurant->id,

                'name' =>  $name,
                
                'ingredients' =>  fake()->words($random_number, true),
                
                'description' =>  fake()->text(50),
                
                'price' =>  fake()->randomFloat(2, 1, 30),
 
                'available' => fake()->boolean(),

                'image' =>$imagePath ,
                
            ]);
            sleep(1);
        }

    }

}
