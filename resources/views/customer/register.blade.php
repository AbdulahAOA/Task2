<!DOCTYPE html>
<html>

<head>

    <title>Customer Register</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-dark text-warning">

                    <h4 class="mb-0">
                        Customer Register
                    </h4>

                </div>

                <div class="card-body">

                    <form
                        action="{{ route('customer.register') }}"
                        method="POST"
                    >

                        @csrf

                        <div class="mb-3">

                            <label>Name</label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                            >

                        </div>

                        <div class="mb-3">

                            <label>Phone</label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                            >

                        </div>

                        <div class="mb-3">

                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                            >

                        </div>

                        <div class="mb-3">

                            <label>Password</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                            >

                        </div>

                        <button
                            type="submit"
                            class="btn btn-warning w-100"
                        >
                            Register
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>