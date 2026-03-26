@extends('admin.layout')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">System Settings</h1>
            <p class="text-gray-500 font-medium">Usimamizi wa vigezo vya mfumo na malipo.</p>
        </div>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-800">
            {{ session('status') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <div class="lg:col-span-8">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sm:p-8">
                <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="sm:col-span-2">
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Site Name</label>
                            <input type="text" name="site_name" value="{{ config('app.name') }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" placeholder="Cross Tanzania Cycling" />
                        </div>

                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Lipa Namba</label>
                            <input type="text" name="lipa_namba" value="{{ $settings->where('key', 'lipa_namba')->first()?->value ?? '253627' }}" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" />
                        </div>

                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Currency</label>
                            <input type="text" name="currency" value="TZS" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" />
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-50">
                        <h3 class="text-sm font-black text-gray-900 uppercase tracking-tight mb-4">SMTP / Email Settings</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Mail Host</label>
                                <input type="text" name="mail_host" value="smtp.mailtrap.io" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" />
                            </div>
                            <div>
                                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Mail Port</label>
                                <input type="text" name="mail_port" value="2525" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" />
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="px-6 py-2.5 bg-red-600 rounded-xl text-sm font-bold text-white shadow-lg shadow-red-600/20 hover:bg-red-700 transition-all">Save Settings</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="lg:col-span-4">
            <div class="bg-[#0f172a] p-6 rounded-3xl shadow-xl text-white">
                <h3 class="font-black text-gray-400 uppercase tracking-tight text-xs mb-4">Information</h3>
                <p class="text-sm font-medium leading-relaxed text-gray-300">
                    Mabadiliko yoyote hapa yataathiri mfumo mzima mara moja. Hakikisha taarifa za malipo (Lipa Namba) ni sahihi.
                </p>
            </div>
        </div>
    </div>
@endsection
