@include('budget.header')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
        @isset($budgets)
            @foreach ($budgets as $budget)
            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                <div class="row">
                  <div class="col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                          </div>
                          <div class="dropdown">
                            <button
                              class="btn p-0"
                              type="button"
                              id="cardOpt4"
                              data-bs-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="cardOpt4">
                              <a class="dropdown-item" href="{{ route('budget.show', $budget->id) }}">View More</a>
                              <a class="dropdown-item" href=""><form action="{{ route('budget.delete', $budget->id) }}" method="post">@method('DELETE')@csrf <input type="submit" value="Delete"></form></a>
                            </div>
                          </div>
                        </div>
                        <span class="d-block mb-1">Budget: {{ $budget->description }}</span>
                        <h3 class="card-title text-nowrap mb-2">#{{ $budget->amount }}</h3>
                        <small class="text-danger fw-semibold">Till- <i class="bx bx-arrow-alt"></i>{{ $budget->duration }}</small>
                      </div>
                    </div>
                  </div>
                  <!-- </div>
  <div class="row"> -->
                </div>
              </div>
            @endforeach
        @endisset
                
              </div>
              
            </div>
            <!-- / Content -->
            @include('budget.footer')