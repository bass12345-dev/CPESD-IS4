<div class="row">
	<div class="col-md-6">
		<table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch id="_table">
			<tr>
				<td colspan="2"> <a href="javascript:;" class="mt-2  mb-2 btn sub-button text-center  btn-rounded btn-md btn-block"><i class = "fa fa-user" aria-hidden = "true"></i> CSO Information</a> 
				<a href="javascript:;" id="update-cso-information" class="mt-2  mb-2  text-center  btn-rounded btn-md btn-block"><i class = "fa fa-edit" aria-hidden = "true"></i> Update CSO Information</a> </td>
			</tr>
			<tr>
				<td>CSO</td>
				<td class="cso_code"></td>
			</tr>
			<tr>
				<td>CSO</td>
				<td class="cso_name"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td class="cso_address"></td>
			</tr>
			<tr>
				<td>Contact Person</td>
				<td class="contact_person"></td>
			</tr>
			<tr>
				<td>Contact Number</td>
				<td class="contact_number"></td>
			</tr>
			<tr>
				<td>Telephone Number</td>
				<td class="telephone_number"></td>
			</tr>
			<tr>
				<td>Email Address</td>
				<td class="email"></td>
			</tr>
			<tr>
				<td>CSO Classification</td>
				<td class="classification"></td>
			</tr>
			<tr>
				<td>CSO Status</td>
				<td class="cso_status"> </td>
			</tr>
			<!-- <tr>
				<td>COR</td>
				<td><a href="javascript:;" class="view-pdf" id="view_cor" data-type="cor">View COR</a> <a href="javascript:;" class="btn btn-rounded btn-secondary pull-right" id="update_cor">Update COR</a></td>
			</tr>
			<tr>
				<td>Bylaws</td>
				<td><a href="javascript:;" class="view-pdf" id="view_bylaws" data-type="bylaws">View Bylaws</a> <a href="javascript:;" class="btn btn-rounded btn-secondary pull-right" id="update_bylaws">Update Bylaws</a></td>
			</tr>
			<tr>
				<td>Article</td>
				<td><a href="javascript:; " class="view-pdf" id="view_article" data-type="articles">View Article</a> <a href="javascript:;" class="btn btn-rounded btn-secondary pull-right" id="update_article">Update Article</a></td>
			</tr> -->
		</table>
	</div>
	<div class="col-md-6 tree-content">
        <div class="col-md-12"><h1>PDF Viewer</h1></div>
		<div id="canvas_container">
			<div id="pdf_alert"></div>
			<canvas id="pdf_renderer" style="width: 100%;"></canvas>
		</div>
	</div>
</div>