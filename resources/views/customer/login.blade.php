<!DOCTYPE html>
<html>

<head>

    <title>Customer Login</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header bg-dark text-warning">

                    Customer Login

                </div>

                <div class="card-body">

                    <form>

                        <div class="mb-3">

                            <label>Email</label>

                            <input
                                type="email"
                                class="form-control"
                            >

                        </div>

                        <div class="mb-3">

                            <label>Password</label>

                            <input
                                type="password"
                                class="form-control"
                            >

                        </div>

                        <button
                            type="submit"
                            class="btn btn-warning w-100"
                        >
                            Login
                        </button>

                    </form>

                    <hr>

                   <div class="d-grid gap-2">

    <a
        href="{{ route('login') }}"
        class="btn btn-dark"
    >
        Admin Login
    </a>

    <a
        href="{{ route('customer.register.form') }}"
        class="btn btn-warning"
    >
        Register User
    </a>

</div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>