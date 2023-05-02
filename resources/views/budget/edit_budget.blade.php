@include('budget.header')
@isset($budget)
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-center"><span class="text-muted fw-light"></span> Add Your Budget Here</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          
          <div class="card-body">
            <form class="contact_form_inner" action="{{ route('budget.update', $budget->id) }}" method="POST">
                @method('PATCH')
                  @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Duration</label>
                <div class="col-sm-10">
                  <input 
                  type="text" 
                  value="{{ $budget->duration }}" 
                  name="duration" 
                  required 
                  class="form-control" 
                  id="basic-default-name" 
                  placeholder="Enter Expiration Date Here" 
                  />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Description</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    value="{{ $budget->description }}"
                    name="description"
                    maxlength="25"
                    required
                    class="form-control"
                    id="basic-default-company"
                    placeholder="Description"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-email">Amount</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <input
                      type="number"
                      value="{{ $budget->amount }}"
                      name="amount"
                      required
                      id="basic-default-email"
                      class="form-control"
                      placeholder="Amount"
                      aria-label="john.doe"
                      aria-describedby="basic-default-email2"
                    />
                  </div>
                  <div class="form-text">You can use only numbers</div>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add Budget</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
      </div>
      @endisset
@include('budget.footer')