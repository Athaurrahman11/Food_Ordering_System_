@extends('admin.layout')

@section('content')

<!-- Main Content -->
<main class="flex-1 flex flex-col min-w-0 overflow-hidden">

    <!-- Dashboard Content -->
    <div class="p-8 overflow-y-auto">
        <div class="flex flex-wrap justify-between items-end gap-4 mb-8">
            <div class="flex flex-col gap-1">
                <h2 class="text-3xl font-black tracking-tight">Messages</h2>
                <p class="text-slate-500 dark:text-slate-400 text-base">View and manage inquiries from the contact form.</p>
            </div>
        </div>

        <!-- Messages Table -->
        <div class="bg-white dark:bg-card-dark rounded-xl border border-slate-200 dark:border-border-dark overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-800/50 border-bottom border-slate-200 dark:border-border-dark">
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Date</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Name</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Email</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Phone</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Message</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-border-dark">
                        @foreach($messages as $message)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">{{ $message->created_at->format('M d, Y h:i A') }}</td>
                             <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-slate-600 dark:text-slate-300">
                                {{ $message->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">{{ $message->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">{{ $message->phone }}</td>
                            <td class="px-6 py-4 text-sm text-slate-500 dark:text-slate-400 max-w-xs truncate" title="{{ $message->message }}">
                                {{ Str::limit($message->message, 50) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-slate-400">
                                 <a href="{{ route('message.delete', $message->id) }}" onclick="confirmation(event)" class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg text-xs font-bold transition-colors">
                                    <span class="material-symbols-outlined text-sm">delete</span>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @if($messages->isEmpty())
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-slate-500">No messages found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- Pagination Footer -->
            <div class="px-6 py-4 bg-slate-50 dark:bg-slate-800/50 border-t border-slate-200 dark:border-border-dark flex items-center justify-between">
                <div class="mt-4">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
