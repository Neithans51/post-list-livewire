<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body>
    <div class="relative">
        <div id="alert-body" class="hidden"
            role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                <span id="alert-msg" class="font-medium"></span>
            </div>
        </div>
    </div>
    @livewire(MenuNavbar::class)
    {{ $slot }}
    @livewireScripts
</body>
<script type="module">
    window.addEventListener('alert', e => {
        const {
            type,
            message
        } = e.detail[0];

        const alertBody = document.getElementById('alert-body');
        const alertMessage = document.getElementById('alert-msg');

        let bgColorClass;
        switch (type) {
            case 'success':
                bgColorClass = 'bg-green-100 text-green-700';
                break;
            case 'warning':
                bgColorClass = 'bg-orange-100 text-orange-700';
                break;
            default:
                bgColorClass = 'bg-white text-dark';
                break;
        }

        alertMessage.textContent = `${message}`;
        alertBody.className = `absolute z-[60] top-0 flex rounded-lg p-4 mb-4 text-sm ${bgColorClass}`;

        setTimeout(() => {
            alertBody.className = 'hidden';
            alertMessage.textContent = '';
        }, 2000);
    });
</script>

</html>
