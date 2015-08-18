<?php

use App\User;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    protected function registeredUser($overides=[])
    {
        return factory(User::class)->create($overides);
    }

    protected function signIn()
    {
        $user = $this->registeredUser([
            'password' => bcrypt('secret'),
            'confirmation_code' => '123',
            'confirmed' => '1'
        ]);

        $this->visit('/')
            ->click('Sign in')
            ->submitForm('Sign In', [
                'email' => $user->email,
                'password' => 'secret',
            ]);
    }

    protected function signUp()
    {
        $dummyUser = factory(User::class)->make()->toArray();

        $dummyUser['password'] = 'secret';

        $this->visit('/')
             ->click('Sign up')
             ->seePageIs('/signup')
             ->see('Please Sign Up')
             ->submitForm('Sign Up', [
                'name'      => $dummyUser['name'],
                'email'     => $dummyUser['email'],
                'password'  => $dummyUser['password']
             ])
             ->seePageIs('/signup');

        return $dummyUser;
    }

    protected function submitContactForm()
    {
        return $this->submitForm('Submit', [
            'email'     => 'john@example.com',
            'name'      => 'John Doe',
            'subject'   => 'Important Subject',
            'message'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem vero consequuntur similique ex, alias suscipit.']);
    }

    protected function signOut()
    {
        $user = $this->registeredUser();

        return $this->visit('/logout');
    }
}
