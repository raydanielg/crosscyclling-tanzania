@extends('admin.layout')

@section('content')
    <div x-data="{ 
        showAddModal: false, 
        showEditModal: false, 
        currentEvent: {},
        deleteUrl: '',
        openEdit(event) {
            this.currentEvent = Object.assign({}, event);
            this.showEditModal = true;
        }
    }">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight">Events Management</h1>
                <p class="text-gray-500 font-medium">Manage cycling events, competitions, and status.</p>
            </div>
            <div>
                <button @click="showAddModal = true" class="px-4 py-2 bg-red-600 rounded-xl text-sm font-bold text-white shadow-lg shadow-red-600/20 hover:bg-red-700 transition-all flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    New Event
                </button>
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
                            <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Event</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Date / Time</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Status</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Slots</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($events as $event)
                            <tr class="hover:bg-gray-50/50 transition-all">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-lg bg-gray-100 overflow-hidden flex-shrink-0 border border-gray-200">
                                            @if($event->image_path)
                                                <img src="{{ asset($event->image_path) }}" class="h-full w-full object-cover" />
                                            @endif
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900 text-sm">{{ $event->name }}</div>
                                            <div class="text-[10px] text-gray-500 font-medium">{{ $event->location }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-xs font-bold text-gray-500">
                                    {{ $event->starts_at ? $event->starts_at->format('M d, Y H:i') : 'TBA' }}
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $st = strtolower((string)$event->status);
                                        $color = match($st) {
                                            'open' => 'bg-green-50 text-green-700',
                                            'closed' => 'bg-red-50 text-red-700',
                                            default => 'bg-amber-50 text-amber-700',
                                        };
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-black uppercase {{ $color }}">
                                        {{ $st ?: 'planned' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-xs font-bold text-gray-700">
                                    {{ $event->slots_remaining ?? 0 }} / {{ $event->slots_total ?? 0 }}
                                </td>
                                <td class="px-6 py-4 text-right space-x-3">
                                    <button @click="openEdit({{ $event->toJson() }})" class="text-xs font-black text-gray-400 hover:text-gray-600 uppercase">Edit</button>
                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this event?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-black text-red-600 hover:text-red-700 uppercase">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-50">
                {{ $events->links() }}
            </div>
        </div>

        <!-- Add Event Modal -->
        <div x-show="showAddModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-gray-900/50 backdrop-blur-sm">
            <div @click.away="showAddModal = false" class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between sticky top-0 bg-white z-10">
                    <h2 class="text-xl font-black text-gray-900 uppercase tracking-tight">Add New Event</h2>
                    <button @click="showAddModal = false" class="text-gray-400 hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="sm:col-span-2">
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Event Name</label>
                            <input type="text" name="name" required class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" placeholder="e.g. Tour de Mwanza" />
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Location</label>
                            <input type="text" name="location" required class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" placeholder="e.g. Rock City" />
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Starts At</label>
                            <input type="datetime-local" name="starts_at" required class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" />
                        </div>
                        <div class="sm:col-span-2">
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Description</label>
                            <textarea name="description" rows="3" required class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" placeholder="Event details..."></textarea>
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Status</label>
                            <select name="status" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0">
                                <option value="planned">Planned</option>
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Applications</label>
                            <select name="application_status" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0">
                                <option value="closed">Closed</option>
                                <option value="open">Open</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Total Slots</label>
                            <input type="number" name="slots_total" required min="1" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" value="50" />
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Distance (KM)</label>
                            <input type="number" step="0.1" name="distance_km" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" placeholder="e.g. 45.5" />
                        </div>
                        <div class="sm:col-span-2">
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Route Info</label>
                            <input type="text" name="route" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" placeholder="e.g. Mwanza - Misungwi" />
                        </div>
                        <div class="sm:col-span-2">
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Banner Image</label>
                            <input type="file" name="image" accept="image/*" class="mt-2 block w-full text-xs text-gray-500" />
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="button" @click="showAddModal = false" class="px-6 py-2.5 rounded-xl text-sm font-bold text-gray-500 hover:bg-gray-50 transition-all">Cancel</button>
                        <button type="submit" class="px-6 py-2.5 bg-red-600 rounded-xl text-sm font-bold text-white shadow-lg shadow-red-600/20 hover:bg-red-700 transition-all">Create Event</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Event Modal -->
        <div x-show="showEditModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-gray-900/50 backdrop-blur-sm">
            <div @click.away="showEditModal = false" class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between sticky top-0 bg-white z-10">
                    <h2 class="text-xl font-black text-gray-900 uppercase tracking-tight">Edit Event</h2>
                    <button @click="showEditModal = false" class="text-gray-400 hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form :action="`/admin/events/${currentEvent.id}`" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="sm:col-span-2">
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Event Name</label>
                            <input type="text" name="name" x-model="currentEvent.name" required class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" />
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Location</label>
                            <input type="text" name="location" x-model="currentEvent.location" required class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" />
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Starts At</label>
                            <input type="datetime-local" name="starts_at" x-model="currentEvent.starts_at" required class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" />
                        </div>
                        <div class="sm:col-span-2">
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Description</label>
                            <textarea name="description" rows="3" x-model="currentEvent.description" required class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0"></textarea>
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Status</label>
                            <select name="status" x-model="currentEvent.status" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0">
                                <option value="planned">Planned</option>
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Applications</label>
                            <select name="application_status" x-model="currentEvent.application_status" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0">
                                <option value="closed">Closed</option>
                                <option value="open">Open</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Total Slots</label>
                            <input type="number" name="slots_total" x-model="currentEvent.slots_total" required min="1" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" />
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Distance (KM)</label>
                            <input type="number" step="0.1" name="distance_km" x-model="currentEvent.distance_km" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" />
                        </div>
                        <div class="sm:col-span-2">
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Route Info</label>
                            <input type="text" name="route" x-model="currentEvent.route" class="mt-2 w-full rounded-xl border border-gray-200 px-4 py-2.5 text-sm focus:border-red-600 focus:ring-0" />
                        </div>
                        <div class="sm:col-span-2">
                            <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Banner Image</label>
                            <div x-show="currentEvent.image_path" class="mt-2 mb-2 h-20 w-32 rounded-lg overflow-hidden border border-gray-200">
                                <img :src="'/' + currentEvent.image_path" class="h-full w-full object-cover" />
                            </div>
                            <input type="file" name="image" accept="image/*" class="mt-2 block w-full text-xs text-gray-500" />
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="button" @click="showEditModal = false" class="px-6 py-2.5 rounded-xl text-sm font-bold text-gray-500 hover:bg-gray-50 transition-all">Cancel</button>
                        <button type="submit" class="px-6 py-2.5 bg-red-600 rounded-xl text-sm font-bold text-white shadow-lg shadow-red-600/20 hover:bg-red-700 transition-all">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
