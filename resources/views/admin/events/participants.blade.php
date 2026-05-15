@extends('admin.layout')

@section('content')
    <!-- Action Buttons -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Participants for {{ $event->name }}</h1>
            <p class="text-gray-500 font-medium">Add or manage participants for this event.</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('admin.events.index') }}" class="px-4 py-2 rounded-xl border border-gray-200 text-sm font-bold text-gray-700 hover:bg-gray-50">Back to events</a>
            
            <form action="{{ route('admin.events.participants.clear', $event) }}" method="POST" onsubmit="return confirm('WARNING: Hii itafuta washiriki WOTE wa event hii. Je, una uhakika?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 rounded-xl bg-red-50 text-red-600 border border-red-100 text-sm font-bold hover:bg-red-600 hover:text-white transition-all flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Clear All Participants
                </button>
            </form>
        </div>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-800 animate__animated animate__fadeIn">
            {{ session('status') }}
        </div>
    @endif

    <div class="grid gap-8 lg:grid-cols-2 mb-12">
        <!-- Modern Upload Box -->
        <div class="rounded-[2.5rem] border-2 border-dashed border-gray-200 bg-white p-8 hover:border-[#2a527d] transition-all group relative overflow-hidden">
            <div class="absolute -right-10 -top-10 h-32 w-32 bg-[#2a527d]/5 rounded-full blur-3xl group-hover:bg-[#2a527d]/10 transition-all"></div>
            
            <div class="relative">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-12 w-12 rounded-2xl bg-blue-50 flex items-center justify-center text-[#2a527d]">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-gray-900">Upload CSV File</h3>
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-widest">Columns: name, phone, type</p>
                    </div>
                </div>

                <form action="{{ route('admin.events.participants.upload', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="relative">
                        <input id="csvFileInput" type="file" name="csv_file" accept=".csv,text/csv" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />
                        <div class="border border-gray-100 rounded-2xl p-6 text-center bg-gray-50 group-hover:bg-white transition-all">
                            <span class="text-sm font-bold text-gray-400 group-hover:text-[#2a527d]">Bonyeza hapa au buruta faili lako (CSV)</span>
                        </div>
                    </div>
                    @error('csv_file')
                        <div class="text-xs text-red-600 font-bold">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 rounded-2xl bg-[#2a527d] text-white font-black shadow-xl shadow-blue-900/10 hover:bg-[#1e3a5f] hover:-translate-y-1 transition-all">
                        Upload and Process List
                    </button>
                </form>

                <div id="csvPreview" class="mt-6 hidden rounded-2xl border border-blue-100 bg-blue-50/50 p-4">
                    <div class="text-[10px] font-black uppercase tracking-widest text-[#2a527d] mb-2">CSV Preview</div>
                    <div id="csvPreviewBody" class="text-xs text-gray-700 space-y-1"></div>
                </div>
            </div>
        </div>

        <!-- Bulk Text Input -->
        <div class="rounded-[2.5rem] border border-gray-100 bg-white p-8 shadow-sm">
            <div class="flex items-center gap-4 mb-6">
                <div class="h-12 w-12 rounded-2xl bg-amber-50 flex items-center justify-center text-amber-600">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                </div>
                <div>
                    <h3 class="text-lg font-black text-gray-900">Bulk Text Paste</h3>
                    <p class="text-xs text-gray-500 font-bold uppercase tracking-widest italic">Format: John Doe, 0712..., self</p>
                </div>
            </div>

            <form action="{{ route('admin.events.participants.bulk', $event) }}" method="POST" class="space-y-4">
                @csrf
                <textarea name="bulk_data" rows="5" class="w-full rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-sm focus:bg-white focus:border-[#2a527d] focus:ring-0 transition-all" placeholder="John Doe,+255712345678,self&#10;Jane Mwana,+255798765432,other"></textarea>
                <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-4 rounded-2xl bg-gray-900 text-white font-black hover:bg-black hover:-translate-y-1 transition-all">
                    Quick Import Participants
                </button>
            </form>
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