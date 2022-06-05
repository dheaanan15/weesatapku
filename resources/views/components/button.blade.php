<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-color1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-color2 active:bg-color2 focus:outline-none focus:bg-color2 focus:ring ring-color2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
