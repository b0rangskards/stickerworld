<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <section class="panel panel-primary" style="box-shadow: 1px 1px 1px rgba(0,0,0,0.2);">
            <header class="panel-heading">
                Details
            </header>
            <div class="panel-body">
                 {{Form::open(['route' => 'update_company_settings_path',
                 'method' => 'PUT',
                 'class' => 'form-horizontal'])}}
                 <div class="row">

                    {{-- Company Name --}}
                    <div class="form-group">
                        {{Form::label('company_name', 'Company Name', ['class'=>'control-label col-lg-4 col-sm-4'])}}
                        <div class="col-lg-6 col-sm-6">
                            {{Form::text('company_name', !is_null($generalSettings) ? $generalSettings->company_name : '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    {{-- Tin No. --}}
                    <div class="form-group">
                        {{Form::label('tin_no', 'Tin No.', ['class'=>'control-label col-lg-4 col-sm-4'])}}
                        <div class="col-lg-6 col-sm-6">
                            {{Form::text('tin_no', !is_null($generalSettings) ? $generalSettings->tin_no : '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    {{-- Vat Rate --}}
                    <div class="form-group">
                        {{Form::label('vat_rate', 'Vat Rate', ['class'=>'control-label col-lg-4 col-sm-4'])}}
                        <div class="col-lg-6 col-sm-6">
                            {{Form::number('vat_rate', !is_null($generalSettings) ? $generalSettings->vat_rate : '', ['class' => 'form-control', 'placeholder' => 'Enter %', 'min' => '0'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-6 col-lg-offset-3">
                            {{Form::submit('Save', ['class' => 'btn btn-primary form-control'])}}
                        </div>
                    </div>

                 </div>
                 {{Form::close()}}
            </div>
        </section>
    </div>
</div>