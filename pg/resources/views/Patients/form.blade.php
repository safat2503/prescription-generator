
<input type="hidden" name="hidden_id" value="{{ $patient->id }}" />
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{$panelHeading}}</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <label>Patient Name</label>
                  <input type="text" id="patient_name" name="patient_name" class="form-control" required maxlength="50" value="{{ old('patient_name') ?? $patient->patient_name }}"/>
                  @error('patient_name')
                  <p class-"text-danger">{{ $message }}</p>
                  @enderror
                </div>

                 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <label>Date of Birth(MM/DD/YYYY)</label>
                  <input type="text" id="date_of_birth" name="date_of_birth" class="form-control dtp" value="{{ old('date_of_birth') ?? $patient->date_of_birth }}"required/>
                  @error('date_of_birth')
                  <p class-"text-danger">{{ $message }}</p>
                  @enderror
                </div>
                
                 <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                  <label>Gender</label>
                  <select id="gender" name="gender" class="form-control" required>
                  <option value="">Select Gender</option>
                  <option value="1" {{ old('gender') == 1 ? 'selected': '' }}>Male</option>
                   <option value="0" {{ old('gender') == 0 ? 'selected': '' }}>Female</option> 
                  </select>
                   @error('gender')
                  <p class-"text-danger">{{ $message }}</p>
                  @enderror
                </div>

                 <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                  <label>Phone No.</label>
                  <input type="text" id="phone_number" name="phone_number" class="form-control" required maxlength="11" value="{{ old('phone_number') ?? $patient->phone_number }}"/>
                   @error('phone_number')
                  <p class-"text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                  <label>&nbsp</label>
                  <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">{{$btnLabel}}</button>
                </div>

            </div>
              <div class="clearfix">&nbsp;</div>
              <div class="clearfix">&nbsp;</div>
          </div>
        </div>





