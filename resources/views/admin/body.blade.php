  <div class="page-content">
    <!-- Page Header -->
        <div class="page-header">
          <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h1 class="page-title">Dashboard</h1>
                    <p class="text-muted">Hotel Management Overview</p>
                </div>
                <div class="col text-right">
                    <div class="btn-group">
                        <button class="btn btn-light">Today</button>
                        <button class="btn btn-light active">Week</button>
                        <button class="btn btn-light">Month</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

    <!-- Stats Cards -->
    <section class="stats-section mb-4">
          <div class="container-fluid">
            <div class="row">
                <!-- Room Bookings -->
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-card-content">
                            <div class="stats-icon bg-primary-light">
                                <i class="fa fa-bed text-primary"></i>
                            </div>
                            <div>
                                <h5 class="stats-label">Room Bookings</h5>
                                <h3 class="stats-value">127</h3>
                                <p class="stats-change positive">
                                    <i class="fa fa-arrow-up"></i> +12.5%
                                </p>
                            </div>
                </div>
                        <div class="stats-chart">
                            <canvas id="roomBookingsChart" height="50"></canvas>
                </div>
              </div>
                </div>

                <!-- Activities -->
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-card-content">
                            <div class="stats-icon bg-success-light">
                                <i class="fa fa-hiking text-success"></i>
              </div>
                            <div>
                                <h5 class="stats-label">Activities Booked</h5>
                                <h3 class="stats-value">48</h3>
                                <p class="stats-change positive">
                                    <i class="fa fa-arrow-up"></i> +8.2%
                                </p>
            </div>
          </div>
                        <div class="stats-chart">
                            <canvas id="activitiesChart" height="50"></canvas>
                      </div>
                    </div>
                  </div>

                <!-- Spa Services -->
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-card-content">
                            <div class="stats-icon bg-info-light">
                                <i class="fa fa-spa text-info"></i>
                            </div>
                            <div>
                                <h5 class="stats-label">Spa Bookings</h5>
                                <h3 class="stats-value">35</h3>
                                <p class="stats-change negative">
                                    <i class="fa fa-arrow-down"></i> -3.1%
                                </p>
                            </div>
                        </div>
                        <div class="stats-chart">
                            <canvas id="spaChart" height="50"></canvas>
                    </div>
                  </div>
                </div>

                <!-- Revenue -->
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card">
                        <div class="stats-card-content">
                            <div class="stats-icon bg-warning-light">
                                <i class="fa fa-euro-sign text-warning"></i>
                            </div>
                            <div>
                                <h5 class="stats-label">Revenue</h5>
                                <h3 class="stats-value">€24,500</h3>
                                <p class="stats-change positive">
                                    <i class="fa fa-arrow-up"></i> +15.3%
                                </p>
                    </div>
                  </div>
                        <div class="stats-chart">
                            <canvas id="revenueChart" height="50"></canvas>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>

    <!-- Main Content -->
    <section class="main-content">
          <div class="container-fluid">
            <div class="row">
                <!-- Bookings Overview -->
                <div class="col-12 mb-4">
                    <div class="card h-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Bookings Overview</h5>
                            <div class="card-actions">
                                <button class="btn btn-sm btn-light">Export</button>
                                <button class="btn btn-sm btn-light">Filter</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div style="height: 300px;">
                                <canvas id="bookingsOverviewChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="col-xl-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Recent Activities</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="activity-feed">
                                <div class="activity-item">
                                    <div class="activity-icon bg-primary-light">
                                        <i class="fa fa-key text-primary"></i>
                                    </div>
                                    <div class="activity-content">
                                        <h6>New Check-in</h6>
                                        <p>Room 304 - John Smith</p>
                                        <small class="text-muted">5 mins ago</small>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon bg-success-light">
                                        <i class="fa fa-hiking text-success"></i>
                                    </div>
                                    <div class="activity-content">
                                        <h6>Activity Booked</h6>
                                        <p>Mountain Hiking - 3 persons</p>
                                        <small class="text-muted">15 mins ago</small>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon bg-info-light">
                                        <i class="fa fa-spa text-info"></i>
                                    </div>
                                    <div class="activity-content">
                                        <h6>Spa Appointment</h6>
                                        <p>Massage Session - Sarah Johnson</p>
                                        <small class="text-muted">1 hour ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Room Booking Status Chart (moved here) -->
                <div class="col-xl-8 mb-4">
                    <div class="card" style="background:#23272b; padding:20px; margin-bottom:20px;">
                        <h4 style="color:#fff;">Room Booking Status</h4>
                        <canvas id="bookingStatusChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Room Availability -->
                <div class="col-xl-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Room Availability</h5>
                </div>
                        <div class="card-body">
                            <div class="room-availability">
                                <div class="availability-item">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-white">Standard Rooms</span>
                                        <span class="badge bg-success">12 Available</span>
                </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 60%"></div>
                  </div>
                </div>
                                <div class="availability-item">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-white">Deluxe Rooms</span>
                                        <span class="badge bg-warning">5 Available</span>
              </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" style="width: 75%"></div>
            </div>
          </div>
                                <div class="availability-item">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-white">Suites</span>
                                        <span class="badge bg-danger">2 Available</span>
                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" style="width: 90%"></div>
                      </div>
                    </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Popular Activities -->
                <div class="col-xl-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Popular Activities</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Activity</th>
                                            <th>Bookings</th>
                                            <th>Rating</th>
                                            <th>Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Mountain Hiking</td>
                                            <td>45</td>
                                            <td>
                                                <div class="rating">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star-half text-warning"></i>
              </div>
                                            </td>
                                            <td>€2,250</td>
                                        </tr>
                                        <tr>
                                            <td>Spa Massage</td>
                                            <td>38</td>
                                            <td>
                                                <div class="rating">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                    </div>
                                            </td>
                                            <td>€1,900</td>
                                        </tr>
                                        <tr>
                                            <td>City Tour</td>
                                            <td>32</td>
                                            <td>
                                                <div class="rating">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star-o text-warning"></i>
                      </div>
                                            </td>
                                            <td>€1,600</td>
                                        </tr>
                                    </tbody>
                                </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
                    </div>

<style>
/* Body styles */
body {
    width: 100%;
    min-height: 100vh;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    background: #2d3035;
}

/* Page Content Container */
.page-content {
    padding: 20px;
    background: #2d3035;
    min-height: 100vh;
    width: calc(100% - 250px); /* Adjust based on sidebar width */
    margin-left: 250px; /* Should match your sidebar width */
    overflow-x: hidden;
}

.container-fluid {
    max-width: 1800px; /* Maximum width of the content */
    margin: 0 auto;
    padding-right: 1.5rem;
    padding-left: 1.5rem;
    width: 100%;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .page-content {
        width: 100%;
        margin-left: 0;
        padding: 15px;
    }
}

/* Page Header */
.page-header {
    padding: 1.25rem 1.5rem;
    background: #34373d;
    margin-bottom: 1.5rem;
    width: 100%;
    border-radius: 0.5rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.page-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #fff;
    margin: 0;
}

.text-muted {
    color: #8a8d93 !important;
    font-size: 0.875rem;
}

/* Stats Cards */
.stats-section {
    margin: 0;
    width: 100%;
}

.row {
    margin-right: 0;
    margin-left: 0;
}

.col-xl-3, .col-xl-4, .col-xl-6, .col-xl-8, .col-md-6 {
    padding-right: 0.75rem;
    padding-left: 0.75rem;
}

.main-content {
    padding: 0;
    width: 100%;
}

.stats-card {
    background: #34373d;
    border-radius: 0.5rem;
    padding: 1.25rem;
    margin-bottom: 1rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
}

.stats-card-content {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.stats-icon {
    width: 48px;
    height: 48px;
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.stats-label {
    font-size: 0.875rem;
    color: #8a8d93;
    margin: 0;
}

.stats-value {
    font-size: 1.5rem;
    font-weight: 600;
    color: #fff;
    margin: 0.25rem 0;
}

.stats-change {
    font-size: 0.875rem;
    margin: 0;
}

.stats-change.positive {
    color: #28a745;
}

.stats-change.negative {
    color: #dc3545;
}

/* Cards */
.card {
    background: #34373d;
    border: none;
    border-radius: 0.5rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
}

.card-header {
    background: #2d3035;
    border-bottom: 1px solid #444;
    padding: 1rem 1.25rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.card-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: #fff;
    margin: 0;
}

.card-actions {
    display: flex;
    gap: 0.5rem;
}

/* Activity Feed */
.activity-feed {
    padding: 1rem;
}

.activity-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem;
    border-bottom: 1px solid #444;
}

.activity-item:last-child {
    border: none;
}

.activity-icon {
    width: 40px;
    height: 40px;
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.activity-content h6 {
    font-size: 0.875rem;
    font-weight: 600;
    color: #fff;
    margin: 0;
}

.activity-content p {
    font-size: 0.875rem;
    color: #8a8d93;
    margin: 0.25rem 0;
}

/* Room Availability */
.room-availability {
    padding: 1rem;
}

.availability-item {
    margin-bottom: 1.5rem;
}

.availability-item:last-child {
    margin-bottom: 0;
}

.progress {
    background: #2d3035;
    height: 0.5rem;
    border-radius: 1rem;
}

/* Table */
.table {
    color: #fff;
    margin: 0;
}

.table th {
    border-top: none;
    border-bottom: 1px solid #444;
    color: #8a8d93;
    font-weight: 500;
    padding: 1rem;
}

.table td {
    border-top: 1px solid #444;
    padding: 1rem;
    vertical-align: middle;
}

.table-hover tbody tr:hover {
    background: #2d3035;
}

.rating {
    color: #ffc107;
}

/* Utility Classes */
.bg-primary-light {
    background: rgba(0,123,255,0.1);
}

.bg-success-light {
    background: rgba(40,167,69,0.1);
}

.bg-info-light {
    background: rgba(23,162,184,0.1);
}

.bg-warning-light {
    background: rgba(255,193,7,0.1);
}

.text-primary {
    color: #007bff !important;
}

.text-success {
    color: #28a745 !important;
}

.text-info {
    color: #17a2b8 !important;
}

.text-warning {
    color: #ffc107 !important;
}

.btn-group .btn {
    background: #2d3035;
    border: 1px solid #444;
    color: #8a8d93;
    font-size: 0.875rem;
    padding: 0.375rem 1rem;
    transition: all 0.2s ease;
}

.btn-group .btn:hover {
    background: #3a3f44;
    color: #fff;
}

.btn-group .btn.active {
    background: #007bff;
    border-color: #007bff;
    color: #fff;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Initialize charts when the document is ready
document.addEventListener('DOMContentLoaded', function() {
    // Room Bookings Chart
    new Chart(document.getElementById('roomBookingsChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                data: [15, 18, 12, 20, 18, 22, 16],
                borderColor: '#007bff',
                borderWidth: 2,
                fill: false,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { display: false },
                y: { display: false }
            }
        }
    });

    // Similar chart initialization for other stats cards...

    // Bookings Overview Chart
    new Chart(document.getElementById('bookingsOverviewChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Room Bookings',
                data: [65, 59, 80, 81, 56, 55],
                backgroundColor: '#007bff'
            }, {
                label: 'Activities',
                data: [28, 48, 40, 19, 86, 27],
                backgroundColor: '#28a745'
            }, {
                label: 'Spa Services',
                data: [35, 25, 30, 45, 35, 40],
                backgroundColor: '#17a2b8'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        padding: 20,
                        color: '#8a8d93'
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#8a8d93'
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#444'
                    },
                    ticks: {
                        color: '#8a8d93',
                        callback: function(value) {
                            return value + ' bookings';
                        }
                    }
                }
            }
        }
    });

    var ctx = document.getElementById('bookingStatusChart').getContext('2d');
    var bookingStatusChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Reserved', 'Approved', 'Rejected'],
            datasets: [{
                label: 'Number of Bookings',
                data: [{{ $reserved ?? 0 }}, {{ $approved ?? 0 }}, {{ $rejected ?? 0 }}],
                backgroundColor: [
                    'rgba(255, 193, 7, 0.7)',   // Reserved (yellow)
                    'rgba(40, 167, 69, 0.7)',   // Approved (green)
                    'rgba(220, 53, 69, 0.7)'    // Rejected (red)
                ],
                borderColor: [
                    'rgba(255, 193, 7, 1)',
                    'rgba(40, 167, 69, 1)',
                    'rgba(220, 53, 69, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: '#fff',
                        font: { size: 16 }
                    }
                }
            }
        }
    });
});
</script>