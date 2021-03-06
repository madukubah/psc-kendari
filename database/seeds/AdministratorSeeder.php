<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	$administrator = new \App\User;
        $administrator->username = "administrator";
        $administrator->name = "Site Administrator";
        $administrator->email = "fachmi.maasy@technoindo.com";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("Indonesia45");
        $administrator->avatar = "saat-ini-tidak-ada-file.png";
        $administrator->address = "Kota Kendari, Sulawesi Tenggara";
	$administrator->phone = "082349452345";

        $administrator->save();

        $this->command->info("User Admin berhasil diinsert");
    }
}
