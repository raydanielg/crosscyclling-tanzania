<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventApplication;
use Illuminate\Http\Request;

class EventApplicationController extends Controller
{
    public function index(Request $request)
    {
        $applications = EventApplication::query()
            ->where('user_id', $request->user()->id)
            ->with('event')
            ->latest('id')
            ->paginate(10);

        return view('rider.my-events', compact('applications'));
    }

    public function show(EventApplication $application)
    {
        abort_unless($application->user_id === auth()->id(), 403);

        $application->load('event');

        return view('rider.applications.show', compact('application'));
    }

    public function step1(Event $event)
    {
        return view('rider.applications.step1', compact('event'));
    }

    public function storeStep1(Request $request, Event $event)
    {
        $user = $request->user();

        $data = $request->validate([
            'applicant_type' => ['required', 'in:self,other'],
            'other_name' => ['nullable', 'string', 'max:255'],
            'other_phone' => ['nullable', 'string', 'max:32'],
        ]);

        $applicantType = $data['applicant_type'];

        if ($applicantType === 'other') {
            $request->validate([
                'other_name' => ['required', 'string', 'max:255'],
                'other_phone' => ['required', 'string', 'max:32'],
            ]);
        }

        $application = EventApplication::query()->create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'applicant_type' => $applicantType,
            'applicant_name' => $applicantType === 'self' ? $user->name : $data['other_name'],
            'applicant_phone' => $applicantType === 'self' ? $user->phone : $data['other_phone'],
            'payment_status' => 'unpaid',
            'status' => 'draft',
        ]);

        return redirect()->route('rider.apply.step2', [$event, $application]);
    }

    public function step2(Event $event, EventApplication $application)
    {
        $this->authorizeApplication($event, $application);

        return view('rider.applications.step2', compact('event', 'application'));
    }

    public function storeStep2(Request $request, Event $event, EventApplication $application)
    {
        $this->authorizeApplication($event, $application);

        $data = $request->validate([
            'payment_method' => ['required', 'in:snniper,lipa_namba'],
        ]);

        $paymentStatus = 'pending';

        $application->update([
            'payment_method' => $data['payment_method'],
            'payment_reference' => null,
            'payment_status' => $paymentStatus,
        ]);

        return redirect()->route('rider.apply.step3', [$event, $application]);
    }

    public function step3(Event $event, EventApplication $application)
    {
        $this->authorizeApplication($event, $application);

        return view('rider.applications.step3', compact('event', 'application'));
    }

    public function finish(Request $request, Event $event, EventApplication $application)
    {
        $this->authorizeApplication($event, $application);

        if ($application->status !== 'draft') {
            return redirect()->route('rider.my-events');
        }

        $application->update([
            'status' => 'pending',
            'submitted_at' => now(),
        ]);

        return redirect()->route('rider.my-events')->with('status', 'Application submitted and pending approval');
    }

    private function authorizeApplication(Event $event, EventApplication $application): void
    {
        abort_unless($application->event_id === $event->id, 404);
        abort_unless($application->user_id === auth()->id(), 403);
    }
}
