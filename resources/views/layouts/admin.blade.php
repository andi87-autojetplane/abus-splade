<div class="min-h-screen bg-gray-100">
    @include('layouts.admin-navigation')
    <div class="flex space-x-4">
        <Sidebar />
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</div>
