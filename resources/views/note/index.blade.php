
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Le mie Note</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($note as $nota)
            <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200 flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-semibold mb-2 text-gray-900">{{ $nota->titolo }}</h2>
                    <p class="text-gray-600 mb-4">
                        {{ Str::limit($nota->contenuto, 150) }} {{-- Taglia il testo se troppo lungo --}}
                    </p>
                </div>
                
                <div class="flex justify-between items-center mt-4 border-t pt-4">
                    <span class="text-xs text-gray-400">
                        {{ $nota->created_at->format('d/m/Y') }}
                    </span>

                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-xl">Non ci sono ancora note. Creane una!</p>
            </div>
        @endforelse
    </div>
</div>
