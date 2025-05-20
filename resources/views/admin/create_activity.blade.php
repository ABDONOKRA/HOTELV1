<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .div_center {
            padding: 40px;
            background: #2d3035;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            margin: 20px;
        }
        .h2_font {
            font-size: 32px;
            padding-bottom: 30px;
            color: #fff;
            text-align: center;
            border-bottom: 2px solid #444;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #8a8d93;
            font-weight: 500;
        }
        .input_color {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #444;
            border-radius: 5px;
            background: #34373d;
            color: #fff;
            transition: all 0.3s ease;
        }
        .input_color:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 2px rgba(0,123,255,0.25);
        }
        select.input_color {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 1em;
        }
        textarea.input_color {
            min-height: 100px;
            resize: vertical;
        }
        .btn-primary {
            background: #007bff;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            width: auto;
            display: inline-block;
        }
        .btn-primary:hover {
            background: #0056b3;
            transform: translateY(-1px);
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert-success {
            background: rgba(40, 167, 69, 0.2);
            border: 1px solid #28a745;
            color: #28a745;
        }
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .file-input-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }
        .file-input-button {
            background: #34373d;
            color: #fff;
            padding: 10px 15px;
            border: 1px solid #444;
            border-radius: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .file-input-button:hover {
            background: #3a3f44;
        }
    </style>
</head>
<body>
    @include('admin.header')
    
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        
        <div class="page-content">
            <div class="div_center">
                <h2 class="h2_font">Add Activity/Spa Service</h2>
                
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{url('store_activity')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input class="input_color" type="text" name="name" placeholder="Enter activity/spa name" required value="{{ old('name') }}">
                    </div>
                    
                    <div class="form-group">
                        <label>Type</label>
                        <select class="input_color" name="type" id="type" required>
                            <option value="">Select type</option>
                            <option value="activity" {{ old('type') == 'activity' ? 'selected' : '' }}>Activity</option>
                            <option value="spa" {{ old('type') == 'spa' ? 'selected' : '' }}>Spa Service</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="input_color" name="description" placeholder="Enter description" required>{{ old('description') }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Price (€)</label>
                        <input class="input_color" type="number" name="price" step="0.01" placeholder="Enter price" required value="{{ old('price') }}">
                    </div>
                    
                    <div class="form-group">
                        <label>Duration (hours)</label>
                        <input class="input_color" type="number" name="duration_in_hours" placeholder="Enter duration" required value="{{ old('duration_in_hours') }}">
                    </div>
                    
                    <div class="form-group activity-fields" style="display: none;">
                        <label>Difficulty</label>
                        <select class="input_color" name="difficulty" id="difficulty">
                            <option value="">Select difficulty</option>
                            <option value="easy" {{ old('difficulty') == 'easy' ? 'selected' : '' }}>Easy</option>
                            <option value="moderate" {{ old('difficulty') == 'moderate' ? 'selected' : '' }}>Moderate</option>
                            <option value="hard" {{ old('difficulty') == 'hard' ? 'selected' : '' }}>Hard</option>
                        </select>
                    </div>
                    
                    <div class="form-group activity-fields" style="display: none;">
                        <label>Elevation (optional)</label>
                        <input class="input_color" type="text" name="elevation" placeholder="Enter elevation" value="{{ old('elevation') }}">
                    </div>
                    
                    <div class="form-group">
                        <label>Image</label>
                        <div class="file-input-wrapper">
                            <div class="file-input-button">Choose Image</div>
                            <input type="file" name="image" accept="image/jpeg,image/png,image/gif,image/webp,image/bmp" required>
                            <small class="text-muted d-block mt-2">
                                Supported formats: JPG, JPEG, PNG, GIF, WEBP, BMP (Max size: 5MB)
                            </small>
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <img src="#" alt="Preview" style="max-width: 200px; max-height: 200px; object-fit: contain;">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Add Activity/Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @include('admin.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.querySelector('#type');
            const activityFields = document.querySelectorAll('.activity-fields');
            const difficultySelect = document.querySelector('#difficulty');
            const imageInput = document.querySelector('input[type="file"]');
            const imagePreview = document.querySelector('#imagePreview');
            const previewImg = imagePreview.querySelector('img');
            
            // Handle type selection
            function updateFormFields() {
                const isActivity = typeSelect.value === 'activity';
                activityFields.forEach(field => {
                    field.style.display = isActivity ? 'block' : 'none';
                });
                
                if (isActivity) {
                    difficultySelect.setAttribute('required', 'required');
                } else {
                    difficultySelect.removeAttribute('required');
                }
            }
            
            // Handle image preview
            imageInput.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    const file = this.files[0];
                    
                    // Validate file type
                    const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/bmp'];
                    if (!validTypes.includes(file.type)) {
                        alert('Please select a valid image file (JPG, JPEG, PNG, GIF, WEBP, BMP)');
                        this.value = '';
                        imagePreview.style.display = 'none';
                        return;
                    }
                    
                    // Validate file size (5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        alert('File size must be less than 5MB');
                        this.value = '';
                        imagePreview.style.display = 'none';
                        return;
                    }
                    
                    // Show preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        imagePreview.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.style.display = 'none';
                }
            });
            
            typeSelect.addEventListener('change', updateFormFields);
            updateFormFields(); // Run on page load
        });
    </script>
</body>
</html> 