<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Http\Controller\Auth\ProviderController;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        
    VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
        
        $password = session('password');
        session()->forget('password');
       
        return (new MailMessage)
            ->subject('IntegriSign - Verify Email Address')
            ->line('Click the button below to verify your email address.')
            ->lineIf($notifiable->provider,'Please update your username: '.$notifiable->username)
            ->lineIf($notifiable->provider,'Please update your password: '.$password)
            ->action('Verify Email Address', $url)
            ->salutation("Best regards.");
            
    });

    }



}
