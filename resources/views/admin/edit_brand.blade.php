@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Editar Marca</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Editar Marca</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{ url('/update-brand', $brand_info->brands_id) }}" method="post">
							{{ csrf_field() }}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">Nome da Marca</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="brands_name" value="{{$brand_info->brands_name}}">
							  </div>
							</div>          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Marca Descrição</label>
							  <div class="controls">
								<textarea class="cleditor" name="brands_description" rows="3">{{$brand_info->brands_description}}</textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Atualizar Marca</button>

							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection()