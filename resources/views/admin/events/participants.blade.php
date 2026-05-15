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

    <div class="mb-12">
        <!-- Modern Upload Box -->
        <div class="rounded-[2.5rem] border-2 border-dashed border-gray-200 bg-white p-10 hover:border-[#2a527d] transition-all group relative overflow-hidden text-center" x-data="{ fileName: '', showPreview: false }">
            <div class="absolute -right-10 -top-10 h-32 w-32 bg-[#2a527d]/5 rounded-full blur-3xl group-hover:bg-[#2a527d]/10 transition-all"></div>
            
            <div class="relative max-w-xl mx-auto">
                <div class="mb-8">
                    <div class="h-20 w-20 rounded-3xl bg-blue-50 flex items-center justify-center text-[#2a527d] mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 mb-2">Upload Excel / CSV List</h3>
                    <p class="text-sm text-gray-500 font-bold uppercase tracking-widest">Columns required: <span class="text-red-600">name, phone, type</span></p>
                </div>

                <form action="{{ route('admin.events.participants.upload', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div class="relative group/input">
                        <input id="csvFileInput" type="file" name="csv_file" accept=".csv,text/csv" 
                            @change="fileName = $event.target.files[0].name; showPreview = true"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />
                        
                        <div class="border-2 border-gray-100 rounded-[2rem] p-10 bg-gray-50 group-hover/input:bg-white group-hover/input:border-[#2a527d] transition-all border-dashed">
                            <div x-show="!fileName">
                                <span class="text-base font-black text-gray-400 group-hover/input:text-[#2a527d]">Bonyeza hapa au buruta faili lako hapa</span>
                                <p class="text-xs text-gray-400 mt-2">Inakubali faili za CSV pekee kwa sasa</p>
                            </div>
                            <div x-show="fileName" x-cloak class="flex items-center justify-center gap-3">
                                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                <span class="text-sm font-black text-[#2a527d]" x-text="fileName"></span>
                            </div>
                        </div>
                    </div>

                    @error('csv_file')
                        <div class="text-xs text-red-600 font-bold bg-red-50 py-2 rounded-lg">{{ $message }}</div>
                    @enderror

                    <div id="csvPreview" class="hidden text-left animate__animated animate__fadeIn">
                        <div class="bg-gray-900 rounded-[1.5rem] p-6 shadow-2xl">
                            <div class="flex items-center justify-between mb-4">
                                <div class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Data Preview (First 5 rows)</div>
                                <span class="text-[10px] font-black text-blue-400 uppercase tracking-widest">Verify before upload</span>
                            </div>
                            <div id="csvPreviewBody" class="text-xs text-white/80 font-mono space-y-2 divide-y divide-white/5">
                                <!-- Preview rows will be injected here -->
                            </div>
                        </div>
                    </div>

                    <div x-show="fileName" x-cloak class="animate__animated animate__zoomIn">
                        <button type="submit" class="w-full inline-flex items-center justify-center px-8 py-5 rounded-2xl bg-[#2a527d] text-white text-lg font-black shadow-2xl shadow-blue-900/20 hover:bg-[#1e3a5f] hover:-translate-y-1 transition-all">
                            Confirm and Upload List
                        </button>
                    </div>
                </form>
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