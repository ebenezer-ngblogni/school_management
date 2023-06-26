@extends('layouts.app')

@section('content')




 <!--**********************************
            Content body start
        ***********************************-->
            <!-- row -->
            <div class="container-fluid">

                <div class="row">
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="widget-stat card bg-primary overflow-hidden">
							<div class="card-header">
								<h3 class="card-title text-white">Total des étudiants</h3>
								<h5 class="text-white mb-0">{{ $getStudent->total() }}</h5>
							</div>
							<div class="card-body text-center mt-3">
								<div class="ico-sparkline">
									<div id="sparkline12"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="widget-stat card bg-success overflow-hidden">
							<div class="card-header">
								<h3 class="card-title text-white">Total des enseignants</h3>
								<h5 class="text-white mb-0">{{ $getTeacher->total() }}</h5>
							</div>
							<div class="card-body text-center mt-4 p-0">
								<div class="ico-sparkline">
									<div id="spark-bar-2"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="widget-stat card bg-secondary overflow-hidden">
							<div class="card-header pb-3">
								<h3 class="card-title text-white">Total des cours</h3>
								<h5 class="text-white mb-0">{{ $getCourse->total() }}</h5>
							</div>
							<div class="card-body p-0 mt-2">
								<div class="px-4"><span class="bar1" data-peity='{ "fill": ["rgb(0, 0, 128)", "rgb(7, 135, 234)"]}'>6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="widget-stat card bg-danger overflow-hidden">
							<div class="card-header pb-3">
								<h3 class="card-title text-white">Total des filières</h3>
								<h5 class="text-white mb-0">{{ $getFiliere->total() }}</h5>
							</div>
							<div class="card-body p-0 mt-1">
								<span class="peity-line-2" data-width="100%">7,6,8,7,3,8,3,3,6,5,9,2,8</span>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-6 col-sm-6">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Income/Expense Report</h3>
							</div>
							<div class="card-body">
								<canvas id="barChart_2"></canvas>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-6 col-sm-6">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Income/Expense Report</h3>
							</div>
							<div class="card-body">
								 <canvas id="areaChart_1"></canvas>
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-xxl-8 col-lg-8 col-md-12 col-sm-12">

                    </div>
					<div class="col-xl-4 col-xxl-4 col-lg-4 col-md-12 col-sm-12">

					</div>

				</div>
            </div>
        <!--**********************************
            Content body end
        ***********************************-->

@endsection
