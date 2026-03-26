@extends('admin.layout')

@section('content')
    <!-- Welcome Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Dashboard Overview</h1>
            <p class="text-gray-500 font-medium">Karibu tena, hapa ndio kituo kikuu cha Cross Tanzania Cycling.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm font-bold text-gray-700 shadow-sm hover:bg-gray-50 transition-all">Export Report</button>
            <button class="px-4 py-2 bg-red-600 rounded-xl text-sm font-bold text-white shadow-lg shadow-red-600/20 hover:bg-red-700 transition-all">+ New Event</button>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 group hover:border-red-100 transition-all">
            <div class="flex items-center justify-between mb-4">
                <div class="h-12 w-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <span class="text-xs font-black text-green-600 bg-green-50 px-2 py-1 rounded-lg">+12%</span>
            </div>
            <div class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Total Users</div>
            <div class="mt-1 text-3xl font-black text-gray-900">{{ \App\Models\User::count() }}</div>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 group hover:border-red-100 transition-all">
            <div class="flex items-center justify-between mb-4">
                <div class="h-12 w-12 bg-red-50 rounded-2xl flex items-center justify-center text-red-600 group-hover:bg-red-600 group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="text-xs font-black text-red-600 bg-red-50 px-2 py-1 rounded-lg">Active</span>
            </div>
            <div class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Live Events</div>
            <div class="mt-1 text-3xl font-black text-gray-900">{{ \App\Models\Event::where('status', 'open')->count() }}</div>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 group hover:border-red-100 transition-all">
            <div class="flex items-center justify-between mb-4">
                <div class="h-12 w-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600 group-hover:bg-amber-600 group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <span class="text-xs font-black text-amber-600 bg-amber-50 px-2 py-1 rounded-lg">Pending</span>
            </div>
            <div class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Applications</div>
            <div class="mt-1 text-3xl font-black text-gray-900">{{ \App\Models\EventApplication::where('status', 'pending')->count() }}</div>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 group hover:border-red-100 transition-all">
            <div class="flex items-center justify-between mb-4">
                <div class="h-12 w-12 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <span class="text-xs font-black text-purple-600 bg-purple-50 px-2 py-1 rounded-lg">Total</span>
            </div>
            <div class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Blog Posts</div>
            <div class="mt-1 text-3xl font-black text-gray-900">{{ \App\Models\BlogPost::count() }}</div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Recent Applications -->
        <div class="lg:col-span-8 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-50 flex items-center justify-between">
                <h2 class="font-black text-gray-900 uppercase tracking-tight text-sm">Recent Applications</h2>
                <a href="#" class="text-xs font-bold text-red-600 hover:underline">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50">
                        <tr>
                            <th class="px-6 py-3 text-[10px] font-black uppercase text-gray-400 tracking-widest">Rider</th>
                            <th class="px-6 py-3 text-[10px] font-black uppercase text-gray-400 tracking-widest">Event</th>
                            <th class="px-6 py-3 text-[10px] font-black uppercase text-gray-400 tracking-widest">Status</th>
                            <th class="px-6 py-3 text-[10px] font-black uppercase text-gray-400 tracking-widest text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @php
                            $recentApps = \App\Models\EventApplication::with(['user', 'event'])->latest()->take(5)->get();
                        @endphp
                        @forelse($recentApps as $app)
                            <tr class="hover:bg-gray-50/50 transition-all">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900 text-sm">{{ $app->applicant_name }}</div>
                                    <div class="text-[10px] text-gray-500 font-medium">{{ $app->applicant_phone }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-700">{{ $app->event?->name }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-black uppercase {{ $app->status === 'approved' ? 'bg-green-50 text-green-700' : 'bg-amber-50 text-amber-700' }}">
                                        {{ $app->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-xs font-black text-red-600 hover:text-red-700 uppercase">Manage</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-gray-500 text-sm font-medium">Hakuna maombi mapya kwa sasa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions / Activity -->
        <div class="lg:col-span-4 space-y-6">
            <!-- System Status -->
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                <h3 class="font-black text-gray-900 uppercase tracking-tight text-xs mb-4">System Status</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-600">Database</span>
                        <span class="h-2 w-2 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.5)]"></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-600">Storage Link</span>
                        <span class="h-2 w-2 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.5)]"></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-bold text-gray-600">Payment Gateway</span>
                        <span class="h-2 w-2 rounded-full bg-amber-500 shadow-[0_0_8px_rgba(245,158,11,0.5)]"></span>
                    </div>
                </div>
            </div>

            <!-- Quick Tips -->
            <div class="bg-[#0f172a] p-6 rounded-3xl shadow-xl text-white relative overflow-hidden">
                <div class="absolute -right-4 -top-4 h-24 w-24 bg-red-600 rounded-full opacity-20 blur-2xl"></div>
                <h3 class="font-black uppercase tracking-widest text-[10px] text-red-500 mb-2">Admin Tip</h3>
                <p class="text-sm font-bold leading-relaxed mb-4">Kumbuka kuhakiki malipo (Verify Payment) kabla ya ku-approve application ya Rider.</p>
                <a href="#" class="text-xs font-black text-white bg-red-600 px-4 py-2 rounded-xl inline-block hover:bg-red-700 transition-all">Open Manual</a>
            </div>
        </div>
    </div>
@endsection
