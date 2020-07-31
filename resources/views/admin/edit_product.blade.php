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
					<a href="#">Editar Produto</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Editar Produto</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{ url('/update-product', $product_info->product_id) }}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">Nome do Clube</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" value="{{$product_info->product_name}}">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Descrição do equipamento</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_short_description" value="{{$product_info->product_short_description}}">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Preço</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" value="{{$product_info->product_price}}">
							  </div>
							</div>            

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Atualizar Produto</button>

							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection()