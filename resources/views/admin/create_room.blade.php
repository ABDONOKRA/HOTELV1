<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #23272b; }
    .card-dark {
      background: #181a1b;
      color: #f1f1f1;
      border: none;
      border-radius: 1.5rem;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
    }
    .card-dark .form-label {
      color: #e0e0e0;
      font-size: 1.1rem;
    }
    .card-dark .form-control, .card-dark textarea, .card-dark select {
      background: #23272b;
      color: #f1f1f1;
      border: 1px solid #333;
      border-radius: 0.5rem;
      font-size: 1.1rem;
    }
    .card-dark .form-control:focus, .card-dark textarea:focus, .card-dark select:focus {
      background: #23272b;
      color: #fff;
      border-color: #007bff;
      box-shadow: 0 0 0 0.2rem rgba(0,123,255,.15);
    }
    .card-dark .btn-primary {
      background: #007bff;
      border: none;
      font-size: 1.15rem;
      border-radius: 0.5rem;
      padding: 10px 0;
      font-weight: 600;
      letter-spacing: 1px;
      transition: background 0.2s;
    }
    .card-dark .btn-primary:hover {
      background: #0056b3;
    }
    .form-title {
      font-size: 2rem;
      font-weight: 700;
      text-align: center;
      margin-bottom: 1.5rem;
      color: #f1f1f1;
    }
  </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="container py-5" style="min-height: 80vh;">
      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
          <div class="card card-dark p-4">
            <div class="form-title">Add Rooms</div>
            <form action="{{url('add_room')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label class="form-label">Room Title</label>
                <input type="text" class="form-control" name="title" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" class="form-control" name="price" min="0" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Room Type</label>
                <select class="form-select" name="type" required>
                  <option value="regular">Regular</option>
                  <option value="premium">Premium</option>
                  <option value="deluxe">Deluxe</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Free Wifi</label>
                <select class="form-select" name="wifi" required>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
              <div class="mb-4">
                <label class="form-label">Upload Image</label>
                <input type="file" class="form-control" name="image" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Add Room</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @include('admin.footer')
  </body>
</html>