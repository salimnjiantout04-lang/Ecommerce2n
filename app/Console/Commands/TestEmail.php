<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use App\Models\Auteur;

class TestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email {email?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email sending functionality';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email') ?: 'test@example.com';

        // Create a test auteur
        $testAuteur = new Auteur();
        $testAuteur->nom = 'Test';
        $testAuteur->prenom = 'User';
        $testAuteur->email = $email;
        $testAuteur->numero = '0123456789';
        $testAuteur->contact_what = '123 Test Street';
        $testAuteur->created_at = now();

        $this->info('Sending test email to: ' . $email);

        try {
            Mail::to($email)->send(new OrderConfirmation($testAuteur));
            $this->info('Email sent successfully!');
        } catch (\Exception $e) {
            $this->error('Failed to send email: ' . $e->getMessage());
        }

        return Command::SUCCESS;
    }
}
