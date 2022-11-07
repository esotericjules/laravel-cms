<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'News',

        ]);

        $category2 = Category::create([
            'name' => 'Design',

        ]);

        $category3 = Category::create([
            'name' => 'Partnership',

        ]);

        $author1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
        ]);


        $author2 = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
        ]);


        $author3 = User::create([
            'name' => 'Austin Kernel',
            'email' => 'austin@example.com',
            'password' => Hash::make('password'),
        ]);

        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, est fames rhoncus lacus scelerisque in inceptos auctor, tortor suspendisse et porttitor lacinia primis. Sagittis posuere nisl risus iaculis platea massa taciti pellentesque semper porttitor lectus maecenas, purus mauris aliquet nibh justo congue vitae aptent elementum in. Convallis purus facilisis ullamcorper velit curabitur cubilia placerat sollicitudin, vestibulum potenti mi et quis sed malesuada, sem vitae porttitor feugiat suscipit libero ut. Id aptent posuere per aliquam nisl justo odio quis, habitant nascetur vehicula penatibus lacus montes aenean tellus, tincidunt arcu luctus suscipit lobortis sodales magna.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, est fames rhoncus lacus scelerisque in inceptos auctor, tortor suspendisse et porttitor lacinia primis. Sagittis posuere nisl risus iaculis platea massa taciti pellentesque semper porttitor lectus maecenas, purus mauris aliquet nibh justo congue vitae aptent elementum in. Convallis purus facilisis ullamcorper velit curabitur cubilia placerat sollicitudin, vestibulum potenti mi et quis sed malesuada, sem vitae porttitor feugiat suscipit libero ut. Id aptent posuere per aliquam nisl justo odio quis, habitant nascetur vehicula penatibus lacus montes aenean tellus, tincidunt arcu luctus suscipit lobortis sodales magna.',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',
            'user_id' => $author1->id,
        ]);

        $post2 = $author2->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, est fames rhoncus lacus scelerisque in inceptos auctor, tortor suspendisse et porttitor lacinia primis. Sagittis posuere nisl risus iaculis platea massa taciti pellentesque semper porttitor lectus maecenas, purus mauris aliquet nibh justo congue vitae aptent elementum in. Convallis purus facilisis ullamcorper velit curabitur cubilia placerat sollicitudin, vestibulum potenti mi et quis sed malesuada, sem vitae porttitor feugiat suscipit libero ut. Id aptent posuere per aliquam nisl justo odio quis, habitant nascetur vehicula penatibus lacus montes aenean tellus, tincidunt arcu luctus suscipit lobortis sodales magna.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, est fames rhoncus lacus scelerisque in inceptos auctor, tortor suspendisse et porttitor lacinia primis. Sagittis posuere nisl risus iaculis platea massa taciti pellentesque semper porttitor lectus maecenas, purus mauris aliquet nibh justo congue vitae aptent elementum in. Convallis purus facilisis ullamcorper velit curabitur cubilia placerat sollicitudin, vestibulum potenti mi et quis sed malesuada, sem vitae porttitor feugiat suscipit libero ut. Id aptent posuere per aliquam nisl justo odio quis, habitant nascetur vehicula penatibus lacus montes aenean tellus, tincidunt arcu luctus suscipit lobortis sodales magna.',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg',
        ]);

        $post3 = $author3->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, est fames rhoncus lacus scelerisque in inceptos auctor, tortor suspendisse et porttitor lacinia primis. Sagittis posuere nisl risus iaculis platea massa taciti pellentesque semper porttitor lectus maecenas, purus mauris aliquet nibh justo congue vitae aptent elementum in. Convallis purus facilisis ullamcorper velit curabitur cubilia placerat sollicitudin, vestibulum potenti mi et quis sed malesuada, sem vitae porttitor feugiat suscipit libero ut. Id aptent posuere per aliquam nisl justo odio quis, habitant nascetur vehicula penatibus lacus montes aenean tellus, tincidunt arcu luctus suscipit lobortis sodales magna.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, est fames rhoncus lacus scelerisque in inceptos auctor, tortor suspendisse et porttitor lacinia primis. Sagittis posuere nisl risus iaculis platea massa taciti pellentesque semper porttitor lectus maecenas, purus mauris aliquet nibh justo congue vitae aptent elementum in. Convallis purus facilisis ullamcorper velit curabitur cubilia placerat sollicitudin, vestibulum potenti mi et quis sed malesuada, sem vitae porttitor feugiat suscipit libero ut. Id aptent posuere per aliquam nisl justo odio quis, habitant nascetur vehicula penatibus lacus montes aenean tellus, tincidunt arcu luctus suscipit lobortis sodales magna.',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg',
        ]);

        $post4 = $author1->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, est fames rhoncus lacus scelerisque in inceptos auctor, tortor suspendisse et porttitor lacinia primis. Sagittis posuere nisl risus iaculis platea massa taciti pellentesque semper porttitor lectus maecenas, purus mauris aliquet nibh justo congue vitae aptent elementum in. Convallis purus facilisis ullamcorper velit curabitur cubilia placerat sollicitudin, vestibulum potenti mi et quis sed malesuada, sem vitae porttitor feugiat suscipit libero ut. Id aptent posuere per aliquam nisl justo odio quis, habitant nascetur vehicula penatibus lacus montes aenean tellus, tincidunt arcu luctus suscipit lobortis sodales magna.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, est fames rhoncus lacus scelerisque in inceptos auctor, tortor suspendisse et porttitor lacinia primis. Sagittis posuere nisl risus iaculis platea massa taciti pellentesque semper porttitor lectus maecenas, purus mauris aliquet nibh justo congue vitae aptent elementum in. Convallis purus facilisis ullamcorper velit curabitur cubilia placerat sollicitudin, vestibulum potenti mi et quis sed malesuada, sem vitae porttitor feugiat suscipit libero ut. Id aptent posuere per aliquam nisl justo odio quis, habitant nascetur vehicula penatibus lacus montes aenean tellus, tincidunt arcu luctus suscipit lobortis sodales magna.',
            'category_id' => $category2->id,
            'image' => 'posts/4.jpg',
        ]);

        $tag1 = Tag::create([
            'name' => 'job',

        ]);

        $tag2 = Tag::create([
            'name' => 'customers',

        ]);

        $tag3 = Tag::create([
            'name' => 'record',

        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id, $tag3->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);
        $post4->tags()->attach([$tag1->id, $tag2->id]);
    }
}