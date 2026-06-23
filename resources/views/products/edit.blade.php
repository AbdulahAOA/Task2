<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-pen-to-square fa-lg me-2"></i>
            <span>Edit Product</span>
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
            margin-bottom: 25px;
        }
        .glass-card .card-header {
            background: linear-gradient(135deg, #ffc107, #f59e0b) !important;
            padding: 16px 25px;
            border: none;
            border-radius: 24px 24px 0 0 !important;
        }
        .glass-card .card-header h4 {
            color: #1a1a2e;
            font-weight: 800;
            margin: 0;
            font-size: 1.1rem;
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

        .btn-update {
            background: linear-gradient(135deg, #ffc107, #f59e0b);
            border: none;
            padding: 14px 40px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.05rem;
            color: #1a1a2e;
            transition: all 0.3s;
            cursor: pointer;
        }
        .btn-update:hover {
            transform: scale(1.02);
            box-shadow: 0 0 40px rgba(255, 193, 7, 0.3);
            color: #1a1a2e;
        }
        .btn-update i { margin-right: 10px; }

        .btn-back {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 14px 25px;
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

        .table-dark-glass {
            color: #e0e0e0;
            margin: 0;
            background: transparent !important;
        }
        .table-dark-glass thead th {
            border-bottom: 2px solid #ffc107 !important;
            color: #ffc107 !important;
            font-weight: 700;
            font-size: 0.8rem;
            padding: 12px;
            background: transparent !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .table-dark-glass tbody td {
            padding: 10px 12px;
            border-color: rgba(255, 255, 255, 0.05) !important;
            vertical-align: middle;
            background: transparent !important;
            color: #e0e0e0;
        }
        .table-dark-glass tbody tr {
            background: transparent !important;
            transition: all 0.3s;
        }
        .table-dark-glass tbody tr:hover {
            background: rgba(255, 193, 7, 0.03) !important;
        }
        .table-dark-glass tbody tr td:first-child {
            border-left: 2px solid transparent;
            transition: all 0.3s;
        }
        .table-dark-glass tbody tr:hover td:first-child {
            border-left-color: #ffc107;
        }

        .form-check-custom {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-right: 15px;
            margin-bottom: 8px;
            color: #fff;
            cursor: pointer;
        }
        .form-check-custom input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #ffc107;
            cursor: pointer;
        }

        .image-upload-box {
            border: 2px dashed rgba(255, 193, 7, 0.3);
            border-radius: 16px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.03);
        }
        .image-upload-box:hover {
            border-color: #ffc107;
            background: rgba(255, 193, 7, 0.05);
        }
        .image-upload-box i {
            font-size: 3rem;
            color: rgba(255, 193, 7, 0.3);
            display: block;
            margin-bottom: 10px;
        }
        .image-upload-box p {
            color: rgba(255, 255, 255, 0.5);
            margin: 0;
        }

        .existing-images {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 20px;
        }
        .existing-image-item {
            position: relative;
            width: 80px;
            height: 80px;
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid rgba(255, 193, 7, 0.3);
        }
        .existing-image-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .glass-card .card-body { padding: 18px; }
            .btn-update, .btn-back { width: 100%; text-align: center; }
            .btn-update { margin-top: 10px; }
            .table-dark-glass thead th { font-size: 0.65rem; padding: 8px; }
            .table-dark-glass tbody td { padding: 8px; font-size: 0.85rem; }
        }
    </style>

    <div class="container mt-4">

        @if($errors->any())
            <div class="alert-glass-danger alert-dismissible fade show mb-3">
                <i class="fa-regular fa-circle-xmark me-2"></i>
                <strong>Please fix:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- ===== Product Information ===== --}}
            <div class="glass-card card">
                <div class="card-header">
                    <h4><i class="fa-solid fa-info-circle"></i> Product Information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <span class="label-icon">📁</span>
                                Category
                                <span class="required-star">*</span>
                            </label>
                            <select name="category_id" class="form-control-custom" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->code }} - {{ $category->name_en }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <span class="label-icon">✅</span>
                                Status
                            </label>
                            <select name="status" class="form-control-custom">
                                <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ old('status', $product->status) == 2 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <span class="label-icon">🌐</span>
                                Name Arabic
                            </label>
                            <input type="text" name="name_ar" class="form-control-custom"
                                   value="{{ old('name_ar', $product->name_ar) }}" placeholder="اسم المنتج">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <span class="label-icon">🌐</span>
                                Name English
                                <span class="required-star">*</span>
                            </label>
                            <input type="text" name="name_en" class="form-control-custom"
                                   value="{{ old('name_en', $product->name_en) }}" placeholder="Product Name" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <span class="label-icon">📝</span>
                                Description Arabic
                            </label>
                            <textarea name="description_ar" class="form-control-custom" rows="3"
                                      placeholder="وصف المنتج">{{ old('description_ar', $product->description_ar) }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label-custom">
                                <span class="label-icon">📝</span>
                                Description English
                            </label>
                            <textarea name="description_en" class="form-control-custom" rows="3"
                                      placeholder="Product Description">{{ old('description_en', $product->description_en) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== Colors ===== --}}
            <div class="glass-card card">
                <div class="card-header">
                    <h4><i class="fa-solid fa-palette"></i> Product Colors</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                            $selectedColors = old('colors', $product->colors->pluck('id')->toArray());
                        @endphp
                        @foreach($colors as $color)
                            <div class="col-md-3 col-sm-4">
                                <label class="form-check-custom">
                                    <input type="checkbox" name="colors[]" value="{{ $color->id }}"
                                        {{ in_array($color->id, $selectedColors) ? 'checked' : '' }}>
                                    {{ $color->name_en }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-hint">ℹ️ Select the colors available for this product</div>
                </div>
            </div>

            {{-- ===== Sizes & Prices ===== --}}
            <div class="glass-card card">
                <div class="card-header">
                    <h4><i class="fa-solid fa-money-bill"></i> Sizes & Prices</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark-glass">
                            <thead>
                                <tr>
                                    <th><i class="fa-regular fa-ruler" style="margin-right: 6px;"></i> Size</th>
                                    <th><i class="fa-regular fa-money-bill-1" style="margin-right: 6px;"></i> Price (JD)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sizes as $size)
                                    @php
                                        $existingPrice = $product->prices->where('size_id', $size->id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $size->name_en }}</td>
                                        <td>
                                            <input type="number" step="0.01"
                                                   class="form-control-custom"
                                                   name="prices[{{ $size->id }}]"
                                                   value="{{ old('prices.'.$size->id, $existingPrice->price ?? '') }}"
                                                   placeholder="0.00">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- ===== Quantities ===== --}}
            <div class="glass-card card">
                <div class="card-header">
                    <h4><i class="fa-solid fa-boxes"></i> Product Quantities</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark-glass">
                            <thead>
                                <tr>
                                    <th><i class="fa-regular fa-palette" style="margin-right: 6px;"></i> Color</th>
                                    <th><i class="fa-regular fa-ruler" style="margin-right: 6px;"></i> Size</th>
                                    <th><i class="fa-regular fa-hashtag" style="margin-right: 6px;"></i> Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($colors as $color)
                                    @foreach($sizes as $size)
                                        @php
                                            $existingQty = $product->variationQuantities
                                                ->where('color_id', $color->id)
                                                ->where('size_id', $size->id)
                                                ->first();
                                        @endphp
                                        <tr>
                                            <td>{{ $color->name_en }}</td>
                                            <td>{{ $size->name_en }}</td>
                                            <td>
                                                <input type="number"
                                                       class="form-control-custom"
                                                       name="quantities[{{ $color->id }}][{{ $size->id }}]"
                                                       value="{{ old('quantities.'.$color->id.'.'.$size->id, $existingQty->quantity ?? '') }}"
                                                       placeholder="0" min="0">
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- ===== Images ===== --}}
            <div class="glass-card card">
                <div class="card-header">
                    <h4><i class="fa-solid fa-image"></i> Product Images</h4>
                </div>
                <div class="card-body">
                    @if($product->images->count())
                        <label class="form-label-custom">
                            <span class="label-icon">🖼️</span>
                            Current Images
                        </label>
                        <div class="existing-images">
                            @foreach($product->images as $image)
                                <div class="existing-image-item">
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="Product Image">
                                </div>
                            @endforeach
                        </div>
                        <hr style="border-color: rgba(255,255,255,0.05);">
                    @endif

                    <div class="image-upload-box" onclick="document.getElementById('images').click()">
                        <i class="fa-regular fa-cloud-arrow-up"></i>
                        <p>Click to upload new images</p>
                        <p style="font-size:0.8rem;color:rgba(255,255,255,0.3);">
                            <span id="fileCount">No new files selected</span>
                        </p>
                        <input type="file" name="images[]" id="images" multiple
                               accept="image/*" style="display:none;"
                               onchange="updateFileCount(this)">
                    </div>
                    <div class="form-hint">ℹ️ You can add more images. JPG, PNG, WebP</div>
                </div>
            </div>

            {{-- ===== Buttons ===== --}}
            <div class="d-flex gap-3 mt-3 flex-wrap">
                <a href="{{ route('products.index') }}" class="btn-back">
                    <i class="fa-regular fa-arrow-left"></i> Back to Products
                </a>
                <button type="submit" class="btn-update">
                    <i class="fa-regular fa-floppy-disk"></i> Update Product
                </button>
            </div>

        </form>
    </div>

    <script>
        function updateFileCount(input) {
            const count = input.files.length;
            document.getElementById('fileCount').textContent = count + ' new file(s) selected';
        }
    </script>

</x-app-layout>