@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Sub-categorias</a></li>
			</ul>
			<p class="alert-success">
						<?php
						$message=Session::get('message');
						
						if($message){
							echo $message;
							Session::put('message', NULL);
						}
						?>
						
			</p>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Sub-categorias</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>ID Sub-categoria</th>
								  <th>Nome da Sub-categoria</th>
								  <th>Descrição da Sub-categoria</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  @foreach($all_subcategory_info as $v_subcategory)
						  <tbody>
							<tr>
								<td>{{ $v_subcategory->subcategories_id }}</td>
								<td class="center">{{ $v_subcategory->subcategories_name }}</td>
								<td class="center">{{ $v_subcategory->subcategories_description }}</td>
								<td class="center">
									@if($v_subcategory->publication_status==1)
									<span class="label label-success">Ativo</span>
									@else
									<span class="label label-danger">Desativado</span>
									@endif
								</td>
								<td class="center">
									@if($v_subcategory->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/unactive_subcategory/'.$v_subcategory->subcategories_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active_subcategory/'.$v_subcategory->subcategories_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif
									<a class="btn btn-info" href="{{URL::to('/edit-subcategory/'.$v_subcategory->subcategories_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-subcategory/'.$v_subcategory->subcategories_id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
							
						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection()