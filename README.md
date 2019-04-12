# Forum Deadline:10th April
Forum for database project

# Features Done:-

1. Threads
2. Reply to Threads 
3. Channels
4. Can filter though Channels and By username Also By Popularity
5. A user can favorite a Reply.
6. A user can Log and register and create Threads.


# Features Need to be Added:-



# Instractions to Set Up
-------------------------
After clonning here's some things you need to do:
1. **.env.example** -> .env
2. set up your database env in .env file.
3. now run **composer install** of dependencies.
4. now run **php artisan key:generate** to Generate an app encryption key.
5. now run **php artisan migrate** to migrate database.
6. now run **php artisan db:seed** for seeding with faker

#  Instraction to Seed Database with facker 
--------------------------------------------
1. Run **php artisan tinker**.
2. To generate 50 threads associated to relavent user you need to use this command:-
3. Run **factory('App\Thread', 50)->create();** in cli of laravel tinker.
4. Now we need to create relavent replies for each threads to do that we this commands.
5. Run **$threads = factory('App\Thread', 50)->create();**

   **$threads->each(function($thread){ factory('App\Reply', 10)->create([ 'thread_id' => $thread->id ]); });**
   
   this with generate 10 replies for each threads where we have 50 threads.
