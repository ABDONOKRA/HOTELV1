<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color {
            color: black;
        }
        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }
        label {
            display: inline-block;
            width: 200px;
            text-align: left;
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .current-image {
            max-width: 200px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    @include('admin.header')
    
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        
        <div class="page-content">
            <div class="div_center">
                <h2 class="h2_font">Edit Activity/Spa Service</h2>
                
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                
                <form action="{{route('admin.activities_update', $activity->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label>Name:</label>
                        <input class="input_color" type="text" name="name" value="{{ $activity->name }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Type:</label>
                        <select class="input_color" name="type" required>
                            <option value="activity" {{ $activity->type == 'activity' ? 'selected' : '' }}>Activity</option>
                            <option value="spa" {{ $activity->type == 'spa' ? 'selected' : '' }}>Spa Service</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea class="input_color" name="description" required>{{ $activity->description }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Price:</label>
                        <input class="input_color" type="number" name="price" step="0.01" value="{{ $activity->price }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Duration (hours):</label>
                        <input class="input_color" type="number" name="duration_in_hours" value="{{ $activity->duration_in_hours }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Difficulty:</label>
                        <select class="input_color" name="difficulty">
                            <option value="" {{ is_null($activity->difficulty) ? 'selected' : '' }}>None (Spa)</option>
                            <option value="easy" {{ $activity->difficulty == 'easy' ? 'selected' : '' }}>Easy</option>
                            <option value="moderate" {{ $activity->difficulty == 'moderate' ? 'selected' : '' }}>Moderate</option>
                            <option value="hard" {{ $activity->difficulty == 'hard' ? 'selected' : '' }}>Hard</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Elevation (optional):</label>
                        <input class="input_color" type="text" name="elevation" value="{{ $activity->elevation }}">
                    </div>
                    
                    <div class="form-group">
                        <label>Current Image:</label>
                        @if($activity->image)
                            <img src="/activity/{{ $activity->image }}" class="current-image">
                        @else
                            <p>No image available</p>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label>New Image (optional):</label>
                        <input type="file" name="image">
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update Activity/Service">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @include('admin.footer')
</body>
</html> 