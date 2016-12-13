<?php

namespace Picnook\Http\Controllers;

use Illuminate\Http\Request;
use Route;

class PracticeController extends Controller
{
  //public function index() {
    /*for ($i=0; $i<100; $i++) {
    Route::get('/practice/'.$i, 'PracticeController@example'.$i)->name('practice.example'.$i);
}
*/
     
        
    
    function example79() {
         \Mail::send([], [], function ($message) {
  $message->to('jmb464@g.harvard.edu')
    ->subject('Hello World')
    ->setBody('This is a test message; Testing 123.');
});

return 'Basic, plain text email sent.';
	}



	function example80() {
		# Get the current logged in user
$user = \Auth::user();

# If user is not logged in, make them log in
if(!$user) return redirect()->guest('login');

# Grab any book, just to use as an example
//$book = \App\Book::findOrFail(1);

# Create an array of data, which will be passed/available in the view
$data = array(
    'user' => $user,
    /*'book' => $book,*/
);

\Mail::send('emails.pic-available', $data, function($message) use ($user/*, $pic*/) {

    $recipient_email = $user->email;
    $recipient_name  = $user->first_name;
    $subject  = 'The pic '.'this pic'.' is now available on Foobooks';

    $message->to($recipient_email, $recipient_name)->subject($subject);

});

echo 'HTML email sent.';
	}
}