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
        $user = User::factory(['email' => 'ventusblade1@gmail.com'])->create();
        $clients = Client::factory(5)->for($user)->create();
        $invoices = Invoice::factory(26)->for($clients->first())->create();
        $paidInvoice = Invoice::factory()->paid()->for($clients->first())->create();
        InvoiceItem::factory(3)->for($invoices->first())->create();
        InvoiceItem::factory(4)->for($paidInvoice)->create();
    }
}
