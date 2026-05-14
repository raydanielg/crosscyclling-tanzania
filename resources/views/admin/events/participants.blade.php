@extends('admin.layout')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Participants for {{ $event->name }}</h1>
            <p class="text-gray-500 font-medium">Add or view participants for this event only. Use text bulk input or upload CSV.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.events.index') }}" class="px-4 py-2 rounded-xl border border-gray-200 text-sm font-bold text-gray-700 hover:bg-gray-50">Back to events</a>
            <a href="{{ route('rider.apply.template', $event) }}" class="px-4 py-2 rounded-xl bg-[#2a527d] text-sm font-bold text-white shadow hover:bg-[#1e3a5f]">Download template</a>
        </div>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-800">
            {{ session('status') }}
        </div>
    @endif

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6">
            <div class="text-xs font-black uppercase tracking-widest text-gray-400">Event</div>
            <div class="mt-3 text-lg font-black text-gray-900">{{ $event->name }}</div>
            <div class="mt-2 text-sm text-gray-500">{{ $event->location }}</div>
            <div class="mt-3 text-sm text-gray-500">{{ $event->starts_at ? $event->starts_at->format('M d, Y H:i') : 'TBA' }}</div>
            <div class="mt-4 text-xs uppercase tracking-widest text-gray-400">Participants approved</div>
            <div class="mt-2 text-3xl font-black text-[#2a527d]">{{ $applications->total() }}</div>
        </div>

        <div class="lg:col-span-2 rounded-3xl border border-gray-200 bg-white shadow-sm p-6">
            <div class="text-sm font-black uppercase tracking-widest text-gray-400">Bulk add participants</div>
            <p class="mt-2 text-sm text-gray-500">Use comma-separated rows: name, phone, type. Download the template first for the correct format.</p>

            <form action="{{ route('admin.events.participants.bulk', $event) }}" method="POST" class="mt-4 space-y-4">                @csrf
                <textarea name="bulk_data" rows="4" class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:border-[#2a527d] focus:ring-0" placeholder="John Doe,+255712345678,self\nJane Mwana,+255798765432,other"></textarea>
                @error('bulk_data')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
                <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-[#2a527d] text-white text-sm font-black shadow hover:bg-[#1e3a5f]">Add Bulk Entries</button>
            </form>

            <div class="mt-8 border-t border-gray-100 pt-6">
                <div class="text-sm font-black uppercase tracking-widest text-gray-400">Upload CSV</div>
                <p class="mt-2 text-sm text-gray-500">CSV columns: name, phone, type</p>

                <form action="{{ route('admin.events.participants.upload', $event) }}" method="POST" enctype="multipart/form-data" class="mt-4 flex flex-col gap-4">
                    @csrf
                    <input id="csvFileInput" type="file" name="csv_file" accept=".csv,text/csv" class="text-sm text-gray-700" />
                    @error('csv_file')
                        <div class="text-xs text-red-600">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-[#2a527d] text-white text-sm font-black shadow hover:bg-[#1e3a5f]">Upload CSV</button>
                </form>

                <div id="csvPreview" class="mt-6 hidden rounded-3xl border border-[#2a527d] bg-[#f0f9ff] p-4">
                    <div class="text-xs font-black uppercase tracking-widest text-[#2a527d]">CSV preview</div>
                    <div id="csvPreviewBody" class="mt-3 text-xs text-gray-700"></div>
                    <div class="mt-3 text-[11px] text-gray-500">Preview shows the first rows of your CSV before upload.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 rounded-3xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest">Rider #</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest">Name</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest">Phone</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest">Type</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest">Payment</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($applications as $application)
                        <tr class="hover:bg-gray-50/60 transition-all">
                            <td class="px-6 py-4 text-xs font-black text-gray-900">{{ $application->rider_number ?? '—' }}</td>
                            <td class="px-6 py-4 font-bold text-gray-900">{{ $application->applicant_name }}</td>
                            <td class="px-6 py-4 text-xs text-gray-600">{{ $application->applicant_phone }}</td>
                            <td class="px-6 py-4 text-xs font-black uppercase text-gray-700">{{ $application->applicant_type }}</td>
                            <td class="px-6 py-4 text-xs font-black uppercase text-gray-700">{{ $application->status }}</td>
                            <td class="px-6 py-4 text-xs uppercase text-gray-700">{{ $application->payment_method ?: '—' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-sm text-gray-500">Hakuna participants bado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $applications->links() }}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('csvFileInput');
            const preview = document.getElementById('csvPreview');
            const previewBody = document.getElementById('csvPreviewBody');

            if (!input) return;

            input.addEventListener('change', function () {
                const file = this.files && this.files[0];
                if (!file) {
                    preview.classList.add('hidden');
                    previewBody.innerHTML = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (event) {
                    const text = event.target.result;
                    const rows = text.trim().split(/\r?\n/).slice(0, 6);

                    if (!rows.length) {
                        preview.classList.add('hidden');
                        previewBody.innerHTML = '';
                        return;
                    }

                    previewBody.innerHTML = rows.map(function (row, index) {
                        return '<div class="py-1 border-b border-gray-200 last:border-0">' + (index + 1) + '. ' + row + '</div>';
                    }).join('');
                    preview.classList.remove('hidden');
                };
                reader.readAsText(file);
            });
        });
    </script>
@endsection