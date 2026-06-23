<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-folder-plus fa-lg me-2"></i>
            <span>Create Category</span>
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
        .glass-card .card-header h4 i { margin-right: 10px; }
        .glass-card .card-body { padding: 25px; color: #fff; }

        .form-label-custom {
            color: #ffc107;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .form-label-custom .label-icon {
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
        }
        .form-label-custom .required-star {
            color: #ef4444;
            margin-left: 2px;
        }

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
        .form-control-custom::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }
        .form-control-custom option {
            background: #1a1a2e;
            color: #fff;
        }

        .form-hint {
            color: rgba(255, 255, 255, 0.35);
            font-size: 0.75rem;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .btn-save {
            background: linear-gradient(135deg, #ffc107, #f59e0b);
            border: none;
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            color: #1a1a2e;
            transition: all 0.3s;
            cursor: pointer;
        }
        .btn-save:hover {
            transform: scale(1.02);
            box-shadow: 0 0 40px rgba(255, 193, 7, 0.3);
            color: #1a1a2e;
        }
        .btn-save i { margin-right: 8px; }

        .btn-back {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
        }
        .btn-back:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #ffc107;
            transform: translateY(-2px);
        }
        .btn-back i { margin-right: 8px; }

        .alert-glass-danger {
            background: rgba(239, 68, 68, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 12px;
            color: #ef4444;
            padding: 12px 16px;
        }
        .alert-glass-danger ul { margin: 5px 0 0 0; padding-left: 20px; }
        .alert-glass-danger ul li { color: #ef4444; }
        .alert-glass-danger .btn-close { filter: invert(1) brightness(2); }

        @media (max-width: 768px) {
            .glass-card .card-body { padding: 18px; }
            .btn-save, .btn-back { width: 100%; text-align: center; }
            .btn-save { margin-top: 10px; }
        }
    </style>

    <div class="container mt-4">
        <div class="glass-card card">
            <div class="card-header">
                <h4><i class="fa-solid fa-folder-plus"></i> Category Information</h4>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert-glass-danger alert-dismissible fade show mb-3">
                        <i class="fa-regular fa-circle-xmark me-2"></i>
                        <strong>Please fix the following:</strong>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- Parent Category --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <span class="label-icon">📁</span>
                                Parent Category
                            </label>
                            <select name="parent_category_id" class="form-control-custom">
                                <option value="">Main Category</option>
                                @foreach($parentCategories as $parentCategory)
                                    <option value="{{ $parentCategory->id }}"
                                        {{ old('parent_category_id') == $parentCategory->id ? 'selected' : '' }}>
                                        {{ $parentCategory->code }} - {{ $parentCategory->name_en }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-hint">ℹ️ Leave empty for main category</div>
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <span class="label-icon">✅</span>
                                Status
                            </label>
                            <select name="status" class="form-control-custom">
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            <div class="form-hint">ℹ️ Active = visible to customers</div>
                        </div>

                        {{-- Category Code --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <span class="label-icon">📝</span>
                                Category Code
                                <span class="required-star">*</span>
                            </label>
                            <input type="text"
                                   name="code"
                                   class="form-control-custom"
                                   value="{{ old('code') }}"
                                   placeholder="ELEC"
                                   required>
                            <div class="form-hint">ℹ️ Unique code for the category</div>
                        </div>

                        {{-- Name Arabic --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <span class="label-icon">🌐</span>
                                Name Arabic
                            </label>
                            <input type="text"
                                   name="name_ar"
                                   class="form-control-custom"
                                   value="{{ old('name_ar') }}"
                                   placeholder="اسم الفئة">
                            <div class="form-hint">ℹ️ Arabic name for the category</div>
                        </div>

                        {{-- Name English --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <span class="label-icon">🌐</span>
                                Name English
                                <span class="required-star">*</span>
                            </label>
                            <input type="text"
                                   name="name_en"
                                   class="form-control-custom"
                                   value="{{ old('name_en') }}"
                                   placeholder="Category Name"
                                   required>
                            <div class="form-hint">ℹ️ English name for the category</div>
                        </div>

                    </div>

                    {{-- BUTTONS --}}
                    <div class="d-flex gap-3 mt-3 flex-wrap">
                        <a href="{{ route('categories.index') }}" class="btn-back">
                            <i class="fa-regular fa-arrow-left"></i> Back to Categories
                        </a>
                        <button type="submit" class="btn-save">
                            <i class="fa-regular fa-floppy-disk"></i> Save Category
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>