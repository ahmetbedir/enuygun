<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WEG Case Study</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-4">
            <div class="col-md-12 text-center">
                <svg class="navbar-logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="162" height="24" viewBox="0 0 162 24">
                    <defs>
                        <path id="a" d="M53.822.36v12.727c.01 1.551.148 3.184 2.441 3.184 2.294 0 2.433-1.633 2.441-3.184V.36h8.02v13.208c0 3.14-.958 5.544-2.847 7.149C62.092 22.232 59.53 23 56.263 23c-3.267 0-5.828-.768-7.613-2.284-1.889-1.605-2.847-4.01-2.847-7.149V.36h8.02zm69.684 0v12.727c.01 1.551.148 3.184 2.441 3.184 2.294 0 2.433-1.633 2.441-3.184L128.39.36h8.02v13.208c0 3.14-.959 5.544-2.848 7.149-1.785 1.516-4.346 2.284-7.614 2.284-3.267 0-5.828-.768-7.613-2.284-1.889-1.605-2.846-4.01-2.846-7.149V.36h8.018zM101.256 0c3.56 0 8.249 1.574 10.44 4.585L104.67 8.09c-.68-.963-1.804-1.512-3.108-1.512-3.141 0-4.784 2.717-4.784 5.4 0 2.415 1.56 4.981 4.449 4.981 1.411 0 3.118-.654 3.53-2.09l.058-.2h-3.825V9.648h12.55v.046c-.057 3.521-.107 6.562-2.724 9.341-2.317 2.483-5.914 3.965-9.62 3.965-3.461 0-6.603-1.064-8.848-2.995-2.388-2.055-3.65-4.945-3.65-8.355C88.697 4.68 93.744 0 101.257 0zM16.783.36v5.86H8.08v2.47h6.616v5.56H8.08v2.53h8.702v5.86H0V.36h16.782zM75.81.34l3.463 5.903h.429L83.01.34h8.09l-7.728 12.655v9.626h-7.836v-9.627L67.659.34h8.15zm-48.166 0l7.277 11.696V.34h7.654v22.28H34.85l-7.302-11.693-.006 11.694h-7.654V.34h7.755zm119.426 0l7.277 11.696V.34H162v22.28h-7.724l-7.302-11.672-.005 11.673h-7.655V.34h7.755z"></path>
                    </defs>
                    <use fill="#2DC44D" fill-rule="evenodd" transform="translate(0 .5)" xlink:href="#a"></use>
                </svg>
            </div>

            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <div class="me-2 fw-bold">Task Statistics</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped no-datatable">
                        <thead>
                            <tr>
                                <th>Total Tasks</th>
                                <th>Total Developers</th>
                                <th>Total Estimated (Hours)</th>
                                <th>Total Estimated (Weeks)</th>
                                <th>Tasks Per Developer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $statistics['total_tasks'] }}</td>
                                <td>{{ $statistics['total_developers'] }}</td>
                                <td>{{ $statistics['total_developers_estimated_hours'] }}</td>
                                <td>{{ $statistics['total_developers_estimated_weeks'] }}</td>
                                <td>{{ $statistics['tasks_per_developer'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="border-bottom" style="width: 100%;"></div>
                <h3 class="text-center" style="width: 45%">Weekly Task Plan</h3>
                <div class="border-bottom" style="width: 100%;"></div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <nav>
                        <div class="nav nav-tabs card-header-tabs" id="nav-tab" role="tablist">
                            @foreach ($weeklyTaskPlan as $week => $plan)
                                <button class="nav-link @if($loop->first) active @endif" id="weekly-plan-tab-{{ $week }}" data-bs-toggle="tab" data-bs-target="#weekly-plan-content-{{ $week }}" type="button" role="tab">
                                    Plan: Week {{ $week }}
                                </button>
                            @endforeach
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="nav-tabContent">
                        @foreach ($weeklyTaskPlan as $week => $plan)
                            <div class="tab-pane fade show @if($loop->first) active @endif" id="weekly-plan-content-{{ $week }}" role="tabpanel">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Task</th>
                                            <th>Estimated</th>
                                            <th>Level</th>
                                            <th>Developer</th>
                                            <th>Developer Level</th>
                                            <th>Developer Estimated</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($plan as $task)
                                            <tr>
                                                <td>{{ $task->name }}</td>
                                                <td>{{ $task->estimated_duration }}</td>
                                                <td>{{ $task->level }}</td>
                                                <td>{{ $task->developer_name  }}</td>
                                                <td>{{ $task->developer_level }}</td>
                                                <td>{{ $task->developer_estimated_duration }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="border-bottom" style="width: 100%;"></div>
                <h3 class="text-center" style="width: 22%">Task List</h3>
                <div class="border-bottom" style="width: 100%;"></div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Estimated</th>
                                <th>Level</th>
                                <th>Developer</th>
                                <th>Developer Level</th>
                                <th>Developer Estimated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->estimated_duration }}</td>
                                    <td>{{ $task->level }}</td>
                                    <td>{{ $task->developer_name  }}</td>
                                    <td>{{ $task->developer_level }}</td>
                                    <td>{{ $task->developer_estimated_duration }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <div class="me-2">Total Tasks Estimated:</div>
                                <div class="fw-bold">{{ $statistics['total_tasks_estimated_hours'] }} Hours</div>
                                <div class="me-2 ms-2">/</div>
                                <div class="fw-bold"> {{ $statistics['total_tasks_estimated_weeks'] }} Week</div>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <div class="me-2">Total Developers Estimated:</div>
                                <div class="fw-bold">{{ $statistics['total_developers_estimated_hours'] }} Hours</div>
                                <div class="me-2 ms-2">/</div>
                                <div class="fw-bold"> {{ $statistics['total_developers_estimated_weeks'] }} Week</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="border-bottom" style="width: 100%;"></div>
                <h3 class="text-center" style="width: 40%">Developers List</h3>
                <div class="border-bottom" style="width: 100%;"></div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <nav>
                        <div class="nav nav-tabs card-header-tabs" id="nav-tab" role="tablist">
                            @foreach ($developers as $developer)
                                <button class="nav-link @if($loop->first) active @endif" id="developer-tab-{{ $developer->id }}" data-bs-toggle="tab" data-bs-target="#developer-content-{{ $developer->id }}" type="button" role="tab">
                                    {{ $developer->name }}
                                </button>
                            @endforeach
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="nav-tabContent">
                        @foreach ($developers as $developer)
                            <div class="mt-2 tab-pane fade show @if($loop->first) active @endif" id="developer-content-{{ $developer->id }}" role="tabpanel">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Task</th>
                                            <th>Task Level</th>
                                            <th>Task Estimated</th>
                                            <th>Developer Estimated</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($developer->tasks as $task)
                                            <tr>
                                                <td>{{ $task->name }}</td>
                                                <td>{{ $task->level }}</td>
                                                <td>{{ $task->estimated_duration }}</td>
                                                <td>{{ $task->developer_estimated_duration }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="card">
                                    <div class="card-footer" style="border-top:0">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">Developer Level:</div>
                                                    <div class="fw-bold">{{ $developer->level }}</div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">Total Developer Estimated:</div>
                                                    <div class="fw-bold">{{ $developer->estimated_duration }} Hours</div>
                                                    <div class="me-2 ms-2">/</div>
                                                    <div class="fw-bold"> {{ $developer->estimated_duration_weeks }} Week</div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">Total Task Estimated:</div>
                                                    <div class="fw-bold">{{ $developer->tasks_estimated_duration }} Hours</div>
                                                    <div class="me-2 ms-2">/</div>
                                                    <div class="fw-bold"> {{ $developer->tasks_estimated_duration_weeks }} Week</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5 px-0 small">
                WEG Case Study
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.table:not(.no-datatable)').DataTable({
                    responsive: true,
                    "order": [[ 1, "desc" ]],
                    "columnDefs": [
                        { "orderable": false, "targets": 0 }
                    ],
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                    "pageLength": 5,
                    "dom": '<"d-flex justify-content-between"lf>rt<"d-flex justify-content-between"ip>',
                });
            });
        </script>
    </body>
</html>
