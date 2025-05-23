<!DOCTYPE html>
<html>
  <head> 
  <base href="/public">
  @include('admin.css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body { background: #23272b; }
    .card-dark {
      background: #181a1b;
      color: #f1f1f1;
      border: none;
    }
    .card-dark .form-label {
      color: #e0e0e0;
    }
    .card-dark .form-control, .card-dark textarea {
      background: #23272b;
      color: #f1f1f1;
      border: 1px solid #333;
    }
    .card-dark .form-control:focus, .card-dark textarea:focus {
      background: #23272b;
      color: #fff;
      border-color: #007bff;
      box-shadow: 0 0 0 0.2rem rgba(0,123,255,.15);
    }
    .btn-primary {
      background: #007bff;
      border: none;
    }
    .btn-primary:hover {
      background: #0056b3;
    }
    .card-dark h2 {
      color: #fff;
    }
    ::placeholder {
      color: #b0b0b0 !important;
      opacity: 1;
    }
  </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->   
    <div class="container py-5" style="min-height: 80vh;">
      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
          <div class="card card-dark shadow-lg border-0 rounded-4">
            <div class="card-body p-5">
              <h2 class="text-center mb-4" style="font-weight: 600; letter-spacing: 1px;">
                Mail send to <span style="color: #339cff;">{{$data->name}}</span>
              </h2>
              <form action="{{url('mail',$data->id)}}" method="post">
                @csrf
                <div class="mb-3">
                  <label class="form-label">Greeting</label>
                  <input type="text" class="form-control form-control-lg rounded-3" name="greeting" required placeholder="Enter greeting">
                </div>
                <div class="mb-3">
                  <label class="form-label">Mail Body</label>
                  <textarea class="form-control form-control-lg rounded-3" name="body" rows="3" required placeholder="Enter mail body"></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">Action Text</label>
                  <input type="text" class="form-control form-control-lg rounded-3" name="action_text" required placeholder="Enter action text">
                </div>
                <div class="mb-3">
                  <label class="form-label">Action Url</label>
                  <input type="text" class="form-control form-control-lg rounded-3" name="action_url" placeholder="Enter action URL">
                </div>
                <div class="mb-4">
                  <label class="form-label">End Line</label>
                  <input type="text" class="form-control form-control-lg rounded-3" name="end_line" required placeholder="Enter end line">
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3">
                  <i class="fas fa-paper-plane me-2"></i>Send Mail
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('admin.footer')
  </body>
</html>