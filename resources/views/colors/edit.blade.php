<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-pen-to-square fa-lg me-2"></i>
            <span>Edit Color</span>
        </div>
    </x-slot>

    <style>
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e) !important;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1a1a2e; }
        ::-webkit-scrollbar-thumb { background: #ffc107; border-radius: 10px; }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6);
            overflow: hidden;
        }
        .glass-card .card-header {
            background: linear-gradient(135deg, #ffc107, #f59e0b) !important;
            padding: 18px 25px;
            border: none;
            border-radius: 24px 24px 0 0 !important;
        }
        .glass-card .card-header h4 {
            color: #1a1a2e;
            font-weight: 800;
            margin: 0;
            font-size: 1.2rem;
        }
        .glass-card .card-body { padding: 25px; color: #fff; }

        .form-label-custom {
            color: #ffc107;
            font-weight: 600;
            margin-bottom: 6px;
        }
        .form-label-custom i { margin-right: 6px; }

        .form-control-custom {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 12px 16px;
            color: #fff;
            transition: all 0.3s;
            width: 100%;
        }
        .form-control-custom:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #ffc107;
            box-shadow: 0 0 30px rgba(255, 193, 7, 0.1);
            color: #fff;
            outline: none;
        }
        .form-control-custom option { background: #1a1a2e; color: #fff; }

        .btn-update {
            background: linear-gradient(135deg, #ffc107, #f59e0b);
            border: none;
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 700;
            color: #1a1a2e;
            transition: all 0.3s;
        }
        .btn-update:hover {
            transform: scale(1.02);
            box-shadow: 0 0 40px rgba(255, 193, 7, 0.3);
            color: #1a1a2e;
        }

        .alert-glass-danger {
            background: rgba(239, 68, 68, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 12px;
            color: #ef4444;
            padding: 12px 16px;
        }
        .alert-glass-danger ul { margin: 5px 0 0 0; padding-left: 20px; }
    </style>

    <div class="container mt-4">
        <div class="glass-card card">
            <div class="card-header">
                <h4><i class="fa-solid fa-pen-to-square"></i> Edit Color</h4>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert-glass-danger alert-dismissible fade show mb-3">
                        <i class="fa-regular fa-circle-xmark me-2"></i>
                        <strong>Please fix:</strong>
                        <ul>@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('colors.update', $color->id) }}" method="POST">
                    @csrf @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <i class="fa-regular fa-language"></i> Name Arabic
                            </label>
                            <input type="text" name="name_ar" class="form-control-custom"
                                   value="{{ old('name_ar', $color->name_ar) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <i class="fa-regular fa-language"></i> Name English
                            </label>
                            <input type="text" name="name_en" class="form-control-custom"
                                   value="{{ old('name_en', $color->name_en) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <i class="fa-regular fa-circle"></i> Color Code
                            </label>
                            <div class="d-flex align-items-center gap-3">
                                <input type="color" name="color_code" class="form-control-custom"
                                       style="width:60px;padding:4px;height:50px;cursor:pointer;"
                                       value="{{ old('color_code', $color->color_code ?? '#ffc107') }}">
                                <span id="colorCodeDisplay" style="color:rgba(255,255,255,0.5);">
                                    {{ old('color_code', $color->color_code ?? '#ffc107') }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <i class="fa-regular fa-circle-check"></i> Status
                            </label>
                            <select name="status" class="form-control-custom">
                                <option value="1" {{ $color->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ $color->status == 2 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn-update">
                        <i class="fa-regular fa-floppy-disk me-2"></i> Update Color
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('input[name="color_code"]').addEventListener('input', function() {
            document.getElementById('colorCodeDisplay').textContent = this.value;
        });
    </script>
</x-app-layout>