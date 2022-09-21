<div>
    <div class="mb-10">
        <h1 class="text-xl">QR Code Generator</h1>
    </div>

    <div class="mb-10">
        <div class="mb-5">
            <label for="url" class="block text-sm font-medium text-gray-700">URL to use</label>

            <div class="mt-1">
                <input
                    wire:model.debounce="url"
                    type="text"
                    name="url"
                    id="url"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="https://google.com"
                >
                @error('url')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <button
                class="py-2 px-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white"
                wire:click="generate"
            >
                Generate
            </button>
        </div>
    </div>

    <div>
        @if($this->generating)
            <div>Generating the image...</div>
        @endif

        @if ($this->generatedImage)
            <img src="{{ $this->generatedImage }}"  alt="{{ $this->url }}"/>
        @endif
    </div>
</div>
