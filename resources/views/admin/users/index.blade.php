@extends('admin.layout')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight">Users Management</h1>
            <p class="text-gray-500 font-medium">Manage all registered users and their roles.</p>
        </div>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-800">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50/50">
                    <tr>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">User</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Email / Phone</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Role</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Joined</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50/50 transition-all">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 font-bold overflow-hidden border border-gray-200">
                                        @if($user->avatar_path)
                                            <img src="{{ asset('storage/' . $user->avatar_path) }}" class="h-full w-full object-cover" />
                                        @else
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        @endif
                                    </div>
                                    <div class="font-bold text-gray-900 text-sm">{{ $user->name }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-700">{{ $user->email }}</div>
                                <div class="text-[10px] text-gray-500 font-medium">{{ $user->phone ?: '—' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-black uppercase {{ $user->role === 'admin' ? 'bg-red-50 text-red-700' : 'bg-blue-50 text-blue-700' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs font-bold text-gray-500">
                                {{ $user->created_at?->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-xs font-black text-gray-400 hover:text-gray-600 uppercase">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-50">
            {{ $users->links() }}
        </div>
    </div>
@endsection
