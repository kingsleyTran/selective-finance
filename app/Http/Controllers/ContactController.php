<?php

namespace App\Http\Controllers;

use App\Mail\ContactEnquiryMail;
use App\Services\PrismicService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(PrismicService $prismic): View
    {
        $page = $prismic->getSingle('contact_us');

        return view('contact.show', [
            'page' => $page,
            'slices' => $page->data->body,
        ]);
    }

    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'service' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email'],
            'amount' => ['nullable', 'string', 'max:100'],
            'message' => ['nullable', 'string', 'max:5000'],
        ]);

        $recipient = config('mail.contact_recipient');

        Mail::to($recipient)->send(new ContactEnquiryMail(
            name: $validated['name'],
            phone: $validated['phone'],
            email: $validated['email'],
            service: $validated['service'] ?? null,
            amount: $validated['amount'] ?? null,
            enquiryMessage: $validated['message'] ?? null,
        ));

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your enquiry has been sent successfully. We will be in touch soon.',
            ]);
        }

        return redirect()->back()->withFragment('contact_section')->with('contact_success', 'Thank you! Your enquiry has been sent successfully. We will be in touch soon.');
    }
}
