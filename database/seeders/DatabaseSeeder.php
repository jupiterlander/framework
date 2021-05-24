<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       /*  $book = new Book();

        $book->title = 'Webb design';
        $book->author = 'DB Webb';
        $book->isbn = '978-11-1111-111-1';
        $book->image = 'webdesign.png';

        $book->save(); */

        DB::table('books')->insert([
            'title' => 'Webb design',
            'author' => 'DB Webb',
            'isbn' => '978-11-1111-111-1',
            'image' => '978-11-1111-111-1.png'
        ]);

        DB::table('books')->insert([
            'title' => 'Objekt orientering',
            'author' => 'Noob Ring',
            'isbn' => '978-22-2222-222-2',
            'image' => '978-22-2222-222-2.png'
        ]);

        DB::table('books')->insert([
            'title' => 'Framework',
            'author' => 'Lara Well',
            'isbn' => '978-33-3333-333-3',
            'image' => '978-33-3333-333-3.png'
        ]);
    }
}
