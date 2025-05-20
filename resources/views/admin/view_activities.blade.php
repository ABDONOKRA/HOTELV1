<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .page-content {
            padding: 20px;
        }
        .content-wrapper {
            background: #2d3035;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .h2_font {
            font-size: 32px;
            padding-bottom: 20px;
            color: #fff;
            text-align: center;
            border-bottom: 2px solid #444;
            margin-bottom: 30px;
        }
        .table {
            width: 100%;
            margin-bottom: 0;
            background: transparent;
            border-collapse: separate;
            border-spacing: 0 8px;
        }
        .table th {
            border: none;
            background: #34373d;
            color: #8a8d93;
            font-weight: 500;
            padding: 15px;
            text-transform: uppercase;
            font-size: 0.85em;
            border-radius: 0;
        }
        .table td {
            background: #34373d;
            border: none;
            padding: 15px;
            vertical-align: middle;
            color: #fff;
        }
        .table tr:hover td {
            background: #3a3f44;
        }
        .table tr td:first-child {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }
        .table tr td:last-child {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        .img_size {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        .btn {
            padding: 8px 16px;
            border-radius: 5px;
            font-weight: 500;
            font-size: 0.9em;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-1px);
        }
        .btn-primary {
            background: #007bff;
            border: none;
        }
        .btn-danger {
            background: #dc3545;
            border: none;
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
        .badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.85em;
            font-weight: 500;
        }
        .badge-activity {
            background: #007bff;
            color: white;
        }
        .badge-spa {
            background: #6f42c1;
            color: white;
        }
        .badge-easy {
            background: #28a745;
            color: white;
        }
        .badge-moderate {
            background: #ffc107;
            color: black;
        }
        .badge-hard {
            background: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    @include('admin.header')
    
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        
        <div class="page-content">
            <div class="content-wrapper">
                <h2 class="h2_font">All Activities & Spa Services</h2>
                
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Duration</th>
                                <th>Difficulty</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activities as $activity)
                            <tr>
                                <td><img class="img_size" src="/activities/{{ $activity->image }}" alt="{{ $activity->name }}"></td>
                                <td>{{ $activity->name }}</td>
                                <td>
                                    <span class="badge badge-{{ $activity->type }}">
                                        {{ ucfirst($activity->type) }}
                                    </span>
                                </td>
                                <td>{{ $activity->price }}€</td>
                                <td>{{ $activity->duration_in_hours }} hours</td>
                                <td>
                                    @if($activity->difficulty)
                                        <span class="badge badge-{{ $activity->difficulty }}">
                                            {{ ucfirst($activity->difficulty) }}
                                        </span>
                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('edit_activity', $activity->id)}}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this?')" 
                                       href="{{url('delete_activity', $activity->id)}}" 
                                       class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    @include('admin.footer')
</body>
</html> 