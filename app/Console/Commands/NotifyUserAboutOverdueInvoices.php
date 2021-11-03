<?php

namespace App\Console\Commands;

use App\Models\Invoice;
use App\Notifications\OverdueInvoiceNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class NotifyUserAboutOverdueInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:notify-user-about-overdue-invoices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifies the user about overdue invoices.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Invoice::query()->overdueInvoices()->with('client', 'client.user')->each(function($invoice) {
            Notification::send($invoice->client->user, new OverdueInvoiceNotification($invoice));
        });

        return 0;
    }
}
