@include('budget.header')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4> --}}
                            <!-- Contextual Classes -->

                            <div class="card">
                              <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">My Budget Analysis</h5>
                                <small class="text-muted float-end"><a class="ml-8" href="{{ route('expenses.create', $budget->id) }}"> Add Expenses</a></small>
                              </div>
                              <div class="table-responsive text-nowrap">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Till ?</th>
                                      <th>Description</th>
                                      <th>Amount</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                    <tr class="table-info">
                                      <td>{{ $budget->duration }}</td>
                                      <td>{{ $budget->description }}</td>
                                      <td>{{ $budget->amount }}</td>
                                      <td><a href="{{ route('budget.edit', $budget->id) }}">Edit</a></td>
                                      <td><form action="{{ route('budget.delete', $budget->id) }}" method="post">@method('DELETE')@csrf <input type="submit" value="Delete"></form></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <hr class="my-5" />
                            <!--/ Contextual Classes -->

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Related Expenses</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Created At</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($expenses as $expense)
                        <tr>
                            <td>{{ $expense->created_at->format('d-m-y') }}</td>
                            <td>{{ $expense->description }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td><a href="{{ route('expenses.edit', $expense->id) }}">Edit</a></td>
                            <td><a href=""><form action="{{ route('expenses.delete', $expense->id) }}" method="post">@method('DELETE')@csrf <input type="submit" value="Delete"></form></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              <hr class="my-5" />
              @include('budget.footer')