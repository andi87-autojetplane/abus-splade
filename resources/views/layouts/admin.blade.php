<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')
<<<<<<< HEAD
    <div class="flex space-x-4">
            <!-- Sidebar -->
        <Sidebar />

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

    </div>
=======

    <div class="flex space-x-4">
        <Sidebar />
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

>>>>>>> 4dda2226763d47f32db6b8d0c71c326040c248ee
</div>
