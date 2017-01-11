<style type="text/css" media="screen">
	/*    --------------------------------------------------
	:: General
	-------------------------------------------------- */
body {
	font-family: 'Open Sans', sans-serif;
	color: #353535;
}
.content h1 {
	text-align: center;
}
.content .content-footer p {
	color: #6d6d6d;
    font-size: 12px;
    text-align: center;
}
.content .content-footer p a {
	color: inherit;
	font-weight: bold;
}

/*	--------------------------------------------------
	:: Table Filter
	-------------------------------------------------- */
.panel {
	border: 1px solid #ddd;
	background-color: #fcfcfc;
}
.panel .btn-group {
	margin: 15px 0 30px;
}
.panel .btn-group .btn {
	transition: background-color .3s ease;
}
.table-courses {
	background-color: #fff;
	border-bottom: 1px solid #eee;
}
.table-courses tbody tr:hover {
	cursor: pointer;
	background-color: #eee;
}
.table-courses tbody tr td {
	padding: 10px;
	vertical-align: middle;
	border-top-color: #eee;
}
.table-courses tbody tr.selected td {
	background-color: #eee;
}
.table-courses tr td:first-child {
	width: 38px;
}
.table-courses tr td:nth-child(2) {
	width: 35px;
}
.ckbox {
	position: relative;
}
.ckbox input[type="checkbox"] {
	opacity: 0;
}
.ckbox label {
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}
.ckbox label:before {
	content: '';
	top: 1px;
	left: 0;
	width: 18px;
	height: 18px;
	display: block;
	position: absolute;
	border-radius: 2px;
	border: 1px solid #bbb;
	background-color: #fff;
}
.ckbox input[type="checkbox"]:checked + label:before {
	border-color: #2BBCDE;
	background-color: #2BBCDE;
}
.ckbox input[type="checkbox"]:checked + label:after {
	top: 3px;
	left: 3.5px;
	content: '\e013';
	color: #fff;
	font-size: 11px;
	font-family: 'Glyphicons Halflings';
	position: absolute;
}
.table-courses .star {
	color: #ccc;
	text-align: center;
	display: block;
}
.table-courses .star.star-checked {
	color: #F0AD4E;
}
.table-courses .star:hover {
	color: #ccc;
}
.table-courses .star.star-checked:hover {
	color: #F0AD4E;
}
.table-courses .media-photo {
	width: 35px;
}
.table-courses .media-body {
    display: block;
}
.table-courses .media-meta {
	font-size: 11px;
	color: #999;
}
.table-courses .media .title {
	color: #066f06;
	font-size: 14px;
	font-weight: bold;
	line-height: normal;
	margin: 0;
}
.table-courses .media .title span {
	font-size: .8em;
	margin-right: 20px;
}
.table-courses .media .title span.pagado {
	color: #5cb85c;
}
.table-courses .media .title span.pendiente {
	color: #f0ad4e;
}
.table-courses .media .title span.cancelado {
	color: #d9534f;
}
.table-courses .media .summary {
	font-size: 14px;
}
</style>
<div class="container">
	<div class="row">

		<section class="content">
			<h1>My Courses</h1>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">

						<div class="table-container">
							<table class="table table-courses">
								<tbody>
									<tr class>
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox2" checked>
												<label for="checkbox2"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star star-checked">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<div class="media-body">
													<span class="media-meta pull-right">January 12, 2016</span>
													<h4 class="title">
														Course Title
													</span>
													</h4>
													<p class="summary"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
													tempor.</p>
													<h4 class="title">
														<span>Registered Students : 439</span>
														<span class>Assignment Total : 439</span>
														<span>Rating : 4.9 <i class="glyphicon glyphicon-star"></i></span>
													</h4>
												</div>
											</div>
										</td>
									</tr>
									<tr class="selected">
										<td>
											<div class="ckbox">
												<input type="checkbox" id="checkbox3" checked>
												<label for="checkbox3"></label>
											</div>
										</td>
										<td>
											<a href="javascript:;" class="star star-checked">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<div class="media-body">
													<span class="media-meta pull-right">January 12, 2016</span>
													<h4 class="title">
														Course Title
													</span>
													</h4>
													<p class="summary"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
													tempor.</p>
													<h4 class="title">
														<span>Registered Students : 439</span>
														<span class>Assignment Total : 439</span>
														<span>Rating : 4.9 <i class="glyphicon glyphicon-star"></i></span>
													</h4>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {

	$('.star').on('click', function () {
      $(this).toggleClass('star-checked');
  });
 });
</script>
