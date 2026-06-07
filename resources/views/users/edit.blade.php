<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div class="container mt-4">

        <form
            action="{{ route('users.update', $user->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Name
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ $user->name }}"
                >

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Phone
                </label>

                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    value="{{ $user->phone }}"
                >

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ $user->email }}"
                >

            </div>

            <button
                type="submit"
                class="btn btn-success"
            >
                Update User
            </button>

        </form>

    </div>

</x-app-layout>