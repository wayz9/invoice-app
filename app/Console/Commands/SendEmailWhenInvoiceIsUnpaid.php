<?php

namespace App\Console\Commands;

use App\Mail\UnpaidInvoice;
use App\Models\Invoice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailWhenInvoiceIsUnpaid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:send-email-when-invoice-is-due-and-unpaid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email when clients invoice is due.';

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
        Invoice::query()
            ->with('client', 'items')
            ->whereAutoEmails(true)
            ->whereDate('due_date', '<', now()->format('Y-m-d'))
            ->where('status', '!=', Invoice::INVOICE_PAID)
            ->each(function($invoice) {
                Mail::to($invoice->client->email)->send(new UnpaidInvoice($invoice));
            });

        return 0;
    }
}
