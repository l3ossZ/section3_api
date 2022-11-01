<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $author=new Author();
        $author->first_name="Paperion";
        $author->family_name="Cathion";
        $author->date_of_birth="1981-01-22";
        $author->date_of_death="2050-06-23";
        $author->name="Gergeo";
        $author->lifespan="39";
        $author->url="www.Gergeo.com";
        $author->save();

        $book=new Book();
        $book->title="How to write NodeJS";
        $book->author_id=1;
        $book->summary="I don't know how to write NodeJs, Typescript and I am sorry for the writting php laravel";
        $book->ibsn="Test";
        $book->url="www.google.com";
        $book->save();

    }
}
