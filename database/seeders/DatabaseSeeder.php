<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
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
        $user = User::factory()->create();
        $clients = Client::factory(5)->for($user)->create();
        $invoices = Invoice::factory(2)->for($clients->first())->create();
        InvoiceItem::factory(5)->for($invoices->first())->create();
    }
}
