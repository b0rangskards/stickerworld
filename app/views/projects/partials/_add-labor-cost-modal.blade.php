<div class="modal fade modal-form" id="addLaborCostModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Add Labor Cost</h4>
			</div>
			<div class="modal-body">

			<div class="form">
               {{ Form::open(['route' => 'add_labor_cost_from_project_path',
               'method' => 'PUT',
               'class' => 'form-horizontal',
               'role'  => 'form',
               'data-form-files-remote']) }}
                    {{-- Labor Type --}}
                    <div class="form-group">
                        {{Form::label('type', 'Labor Type', ['class' => 'control-label col-md-3 col-md-offset-1'])}}
                        <div class="col-md-6">
                            {{ Form::select('type', $laborTypes, null,
                            ['class' => 'form-control',
                            'autofocus' => 'autofocus',
                            'required' => 'required']) }}
                            <p class="help-block"></p>
                        </div>
                    </div>

                    {{-- Number of Employee --}}
                    <div class="form-group">
                        {{Form::label('no_of_emp', 'No. of Employee', ['class' => 'control-label col-md-3 col-md-offset-1'])}}
                        <div class="col-md-6">
                            {{ Form::number('no_of_emp', null,
                            ['class' => 'form-control',
                            'min' => '1',
                            'required' => 'required']) }}
                            <p class="help-block"></p>
                        </div>
                    </div>

                    {{-- Number of Days --}}
                    <div class="form-group">
                        {{Form::label('no_of_days', 'No. of Days', ['class' => 'control-label col-md-3 col-md-offset-1'])}}
                        <div class="col-md-6">
                            {{ Form::number('no_of_days', null,
                            ['class' => 'form-control',
                            'min' => '1',
                            'required' => 'required']) }}
                            <p class="help-block"></p>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            {{ Form::submit('Add Labor Cost', ['class' => 'btn btn-primary btn-block']) }}
                        </div>
                    </div>
                {{Form::close()}}
                </div>
			</div>
		</div>
	</div>
</div>

