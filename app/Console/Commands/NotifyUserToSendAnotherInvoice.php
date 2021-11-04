<?php

namespace App\Console\Commands;

use App\Models\Client;
use App\Models\Invoice;
use App\Notifications\SendAnotherInvoiceNotification;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

class NotifyUserToSendAnotherInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:notify-user-to-send-another-invoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It reminds user to send another invoice next month based on previous records.';

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
        Client::query()
            ->whereHas('invoices', fn(Builder $builder) => $builder->whereMonth('issue_date', '=', now()->month))
            ->with('user', 'invoices')
            ->each(function($client){
                $client->user->notifyAt(new SendAnotherInvoiceNotification($client), $client->invoices->first()->issue_date->addMonth()->subDays(5));
            });

        return 0;
    }
}
