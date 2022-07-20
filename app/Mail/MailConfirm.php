<?php

namespace App\Mail;

use App\Models\Staffs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $staff;
    /**
     * Create a new message instance.
     *
     * @param Staffs $staff
     */
    public function __construct(Staffs $staff)
    {
        $this->staff = $staff;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = sha1($this->staff->email);
        $url = route('email.verify',['id'=>$this->staff->id,'hash'=>$token]);
        return $this->view('admin.staff.verify-email',['url'=>$url])->to($this->staff->email);
    }
}
