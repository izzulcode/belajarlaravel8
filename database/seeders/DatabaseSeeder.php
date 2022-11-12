<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'name' => 'Muhammad',
            'username' => 'Muhammadzulkarnain',
            'email' => 'Muhammad@gmail.com',
            'password' => bcrypt('1234567890')
        ]);
        // User::create([
        //     'name' => 'Ricky',
        //     'email' => 'Ricky@gmail.com',
        //     'password' => bcrypt('132131')

        // ]);
        // User::create([
        //     'name' => 'Zulkarnain',
        //     'email' => 'Zulkarnain@gmail.com',
        //     'password' => bcrypt('132131')

        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        
        Post::factory(50)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim aspernatur cum modi cupiditate rem rerum maiores iusto, eligendi cumque atque quidem suscipit natus minima magni dolor quasi ratione. Fugit, eveniet!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse suscipit omnis reprehenderit id sed nobis labore dolorem, eveniet rerum odio repellendus perferendis quae nesciunt non animi! Ut harum sapiente, ipsa facilis nihil velit mollitia voluptatibus temporibus! Laudantium adipisci voluptatibus beatae, laboriosam error, commodi velit molestias, labore nostrum impedit alias excepturi unde sed optio. Error vel fugiat repudiandae magni est debitis officiis recusandae laborum, eveniet porro excepturi ipsam doloremque sunt quas, odio omnis ipsum assumenda voluptatibus in illum. Repellat quia porro atque eius iure, voluptates, consectetur culpa accusantium magni perferendis voluptatibus quibusdam veniam fugit neque doloremque beatae. Impedit in commodi rem, obcaecati nisi nesciunt soluta reprehenderit! Minima officiis nostrum incidunt praesentium maiores odit cumque dolores est commodi nemo ad dolor esse impedit possimus, molestias ipsam atque provident voluptatum consequuntur ipsa modi exercitationem? Assumenda obcaecati omnis necessitatibus debitis nulla quibusdam, laudantium nesciunt adipisci ullam impedit nihil cum rem incidunt dolores autem alias. Maxime iure nam deserunt soluta aliquam aliquid cum dignissimos voluptates libero aperiam pariatur possimus voluptatem laboriosam praesentium veniam ex, vitae quaerat exercitationem magni ducimus inventore. Praesentium enim nesciunt corporis, autem inventore ex quae distinctio vitae quam, maiores velit dicta quo in provident ut? Deserunt blanditiis molestiae aliquam exercitationem asperiores neque?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim aspernatur cum modi cupiditate rem rerum maiores iusto, eligendi cumque atque quidem suscipit natus minima magni dolor quasi ratione. Fugit, eveniet!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse suscipit omnis reprehenderit id sed nobis labore dolorem, eveniet rerum odio repellendus perferendis quae nesciunt non animi! Ut harum sapiente, ipsa facilis nihil velit mollitia voluptatibus temporibus! Laudantium adipisci voluptatibus beatae, laboriosam error, commodi velit molestias, labore nostrum impedit alias excepturi unde sed optio. Error vel fugiat repudiandae magni est debitis officiis recusandae laborum, eveniet porro excepturi ipsam doloremque sunt quas, odio omnis ipsum assumenda voluptatibus in illum. Repellat quia porro atque eius iure, voluptates, consectetur culpa accusantium magni perferendis voluptatibus quibusdam veniam fugit neque doloremque beatae. Impedit in commodi rem, obcaecati nisi nesciunt soluta reprehenderit! Minima officiis nostrum incidunt praesentium maiores odit cumque dolores est commodi nemo ad dolor esse impedit possimus, molestias ipsam atque provident voluptatum consequuntur ipsa modi exercitationem? Assumenda obcaecati omnis necessitatibus debitis nulla quibusdam, laudantium nesciunt adipisci ullam impedit nihil cum rem incidunt dolores autem alias. Maxime iure nam deserunt soluta aliquam aliquid cum dignissimos voluptates libero aperiam pariatur possimus voluptatem laboriosam praesentium veniam ex, vitae quaerat exercitationem magni ducimus inventore. Praesentium enim nesciunt corporis, autem inventore ex quae distinctio vitae quam, maiores velit dicta quo in provident ut? Deserunt blanditiis molestiae aliquam exercitationem asperiores neque?',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim aspernatur cum modi cupiditate rem rerum maiores iusto, eligendi cumque atque quidem suscipit natus minima magni dolor quasi ratione. Fugit, eveniet!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse suscipit omnis reprehenderit id sed nobis labore dolorem, eveniet rerum odio repellendus perferendis quae nesciunt non animi! Ut harum sapiente, ipsa facilis nihil velit mollitia voluptatibus temporibus! Laudantium adipisci voluptatibus beatae, laboriosam error, commodi velit molestias, labore nostrum impedit alias excepturi unde sed optio. Error vel fugiat repudiandae magni est debitis officiis recusandae laborum, eveniet porro excepturi ipsam doloremque sunt quas, odio omnis ipsum assumenda voluptatibus in illum. Repellat quia porro atque eius iure, voluptates, consectetur culpa accusantium magni perferendis voluptatibus quibusdam veniam fugit neque doloremque beatae. Impedit in commodi rem, obcaecati nisi nesciunt soluta reprehenderit! Minima officiis nostrum incidunt praesentium maiores odit cumque dolores est commodi nemo ad dolor esse impedit possimus, molestias ipsam atque provident voluptatum consequuntur ipsa modi exercitationem? Assumenda obcaecati omnis necessitatibus debitis nulla quibusdam, laudantium nesciunt adipisci ullam impedit nihil cum rem incidunt dolores autem alias. Maxime iure nam deserunt soluta aliquam aliquid cum dignissimos voluptates libero aperiam pariatur possimus voluptatem laboriosam praesentium veniam ex, vitae quaerat exercitationem magni ducimus inventore. Praesentium enim nesciunt corporis, autem inventore ex quae distinctio vitae quam, maiores velit dicta quo in provident ut? Deserunt blanditiis molestiae aliquam exercitationem asperiores neque?',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim aspernatur cum modi cupiditate rem rerum maiores iusto, eligendi cumque atque quidem suscipit natus minima magni dolor quasi ratione. Fugit, eveniet!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse suscipit omnis reprehenderit id sed nobis labore dolorem, eveniet rerum odio repellendus perferendis quae nesciunt non animi! Ut harum sapiente, ipsa facilis nihil velit mollitia voluptatibus temporibus! Laudantium adipisci voluptatibus beatae, laboriosam error, commodi velit molestias, labore nostrum impedit alias excepturi unde sed optio. Error vel fugiat repudiandae magni est debitis officiis recusandae laborum, eveniet porro excepturi ipsam doloremque sunt quas, odio omnis ipsum assumenda voluptatibus in illum. Repellat quia porro atque eius iure, voluptates, consectetur culpa accusantium magni perferendis voluptatibus quibusdam veniam fugit neque doloremque beatae. Impedit in commodi rem, obcaecati nisi nesciunt soluta reprehenderit! Minima officiis nostrum incidunt praesentium maiores odit cumque dolores est commodi nemo ad dolor esse impedit possimus, molestias ipsam atque provident voluptatum consequuntur ipsa modi exercitationem? Assumenda obcaecati omnis necessitatibus debitis nulla quibusdam, laudantium nesciunt adipisci ullam impedit nihil cum rem incidunt dolores autem alias. Maxime iure nam deserunt soluta aliquam aliquid cum dignissimos voluptates libero aperiam pariatur possimus voluptatem laboriosam praesentium veniam ex, vitae quaerat exercitationem magni ducimus inventore. Praesentium enim nesciunt corporis, autem inventore ex quae distinctio vitae quam, maiores velit dicta quo in provident ut? Deserunt blanditiis molestiae aliquam exercitationem asperiores neque?',
        //     'category_id' => 2,
        //     'user_id' => 3  
        // ]);
    }
}
