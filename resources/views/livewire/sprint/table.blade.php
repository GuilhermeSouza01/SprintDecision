<div class="mt-6 border border-slate-200 rounded-xl overflow-hidden shadow-sm dark:border-slate-700">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 border-b border-slate-200 dark:bg-slate-800 dark:border-slate-700">
        <tr>
            <th class="text-left px-4 py-3 text-slate-500 font-medium dark:text-slate-400">Name</th>
            <th class="text-left px-4 py-3 text-slate-500 font-medium dark:text-slate-400">Code</th>
            <th class="text-left px-4 py-3 text-slate-500 font-medium dark:text-slate-400">Status</th>
            <th class="px-4 py-3"></th>
        </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 bg-white dark:divide-slate-700 dark:bg-slate-900">
        @forelse($this->records as $record)
        <tr class="hover:bg-slate-50 transition-colors dark:hover:bg-slate-800">
            <td class="px-4 py-3 font-medium text-slate-800 dark:text-slate-200">{{ $record->name }}</td>
            <td class="px-4 py-3 text-slate-400 font-mono text-xs">{{ $record->code }}</td>
            <td class="px-4 py-3">
                <span @class([
                    'inline-flex items-center gap-1.5 text-xs font-medium px-2.5 py-1 rounded-full',
                    'text-green-700 bg-green-50' => $record->status === 'open',
                    'text-red-700 bg-red-50' => $record->status === 'closed',
                ])>
                    <span @class([
                        'w-1.5 h-1.5 rounded-full',
                        'bg-green-500' => $record->status === 'open',
                        'bg-red-500' => $record->status === 'closed',
                    ])></span>
                    {{ ucfirst($record->status) }}
                </span>
            </td>
            <td class="px-4 py-3 text-right">
                <a href="{{ route('admin.sprint.show', $record) }}" wire:navigate class="text-slate-400 hover:text-slate-600">
                    <x-heroicon-o-chevron-right class="w-5 h-5" />
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="px-4 py-8 text-center text-slate-400 text-sm">No sprints yet</td>
        </tr>
        @endforelse
        </tbody>
    </table>
    {{ $this->records->links() }}
</div>
