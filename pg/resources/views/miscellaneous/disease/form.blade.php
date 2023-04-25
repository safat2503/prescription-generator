
<input type="hidden" name="hidden_id" value="{{ $disease->id }}" />
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{$panelHeading}}</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Disease Name</label>
                  <input type="text" name="disease_name"  value="{{ old('disease_name') ?? $disease->disease_name }}"
                  id="disease_name" required class="form-control">
                  @error('disease_name')

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


