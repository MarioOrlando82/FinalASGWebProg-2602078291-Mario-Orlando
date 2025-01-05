<?php

namespace Database\Seeders;

use App\Models\Avatar;
use App\Models\Chat;
use App\Models\FieldOfWork;
use App\Models\Payment;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $fieldsOfWork = ['Software Developer', 'Data Scientist', 'Graphic Designer', 'Project Manager', 'Cybersecurity', 'Fullstack Developer', 'Backend Developer', 'Frontend Developer', 'UI/UX Designer'];
        foreach ($fieldsOfWork as $field) {
            FieldOfWork::create(['name' => $field]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Avatar::create([
                'image_path' => "https://via.placeholder.com/150?text=Avatar+$i",
                'price' => rand(50, 100000),
            ]);
        }

        User::factory(10)->create()->each(function ($user) {
            $fieldIds = FieldOfWork::inRandomOrder()->limit(3)->pluck('id');
            $user->fieldsOfWork()->attach($fieldIds);

            Payment::create([
                'user_id' => $user->id,
                'amount_paid' => rand(100000, 125000),
            ]);

            $avatarIds = Avatar::inRandomOrder()->limit(2)->pluck('id');
            $user->avatars()->attach($avatarIds);

            $otherUsers = User::where('id', '!=', $user->id)->inRandomOrder()->limit(3)->pluck('id');
            foreach ($otherUsers as $otherUserId) {
                Wishlist::create([
                    'user_id' => $user->id,
                    'wished_user_id' => $otherUserId,
                ]);
            }

            $chatUsers = User::where('id', '!=', $user->id)->inRandomOrder()->limit(2)->pluck('id');
            foreach ($chatUsers as $chatUserId) {
                Chat::create([
                    'user_id' => $user->id,
                    'receiver_id' => $chatUserId,
                    'message' => 'Hello! This is a sample message.',
                ]);
            }
        });
    }
}
