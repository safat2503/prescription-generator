
<input type="hidden" id="hidden_id" name="hidden_id" value="{{ $medicineDetail->id }}">
<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{$panelHeading}}</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                  <label>Select Medicine</label>
                  <select id="medicine_id" name="medicine_id" class="form-control select2" required>
                    <option value="">Select Medicine</option>
                    @foreach($allMedicines as $am)
                      <option value="{{ $am->id }}">{{ $am->medicine_name }}</option>
                    @endforeach
                  </select>
                  @error('medicine_id')

                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <label>Packing</label>
                  <input type="text" id="packing" class="form-control" name="packing" required value="{{ old('packing') ?? $medicineDetail->packing }}">
                  @error('packing')

                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                  <label>&nbsp</label>
                  <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">{{$btnLabel}}</button>
                </div>

            </div>
          
          </div>
        </div>
