<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Doers</h2>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xl-3 col-lg-4">
			<h3 class="page-title">Filter Results <a href="javascript:;" style="font-size:small;" onclick="ftoggle();">Hide/Show</a></h3>

			<div class="margin-top-35"></div>

			<div id="filter" class="sidebar-container">

				<!-- Keywords -->
				<div class="sidebar-widget">
					<h3>Keywords</h3>
					<div class="keywords-container">
						<div class="keyword-input-container">
							<input id="keyword" type="text" class="keyword-input" placeholder="<?php if(empty($keyword)){echo 'e.g. Doers Name, Category, etc.';} ?>" value="<?php if(!empty($keyword)){echo $keyword;} ?>" />
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				
				<!-- Location -->
				<div class="sidebar-widget">
					<h3>Location</h3>
					<div class="input-with-icon">
						<div id="autocomplete-container">
							<input id="ilocation" type="text" placeholder="<?php if(empty($location)){echo 'Location';} ?>" value="<?php if(!empty($location)){echo $location;} ?>" />
							<i class="icon-material-outline-location-on"></i>
						</div>
					</div>
				</div>

				<!-- Category -->
				<div class="sidebar-widget">
					<h3>Category</h3>
					<select id="category" class="selectpicker default" multiple data-selected-text-format="count" data-size="7" title="All Categories" >
						<?php 
							$category = $this->Crud->read_order('category', 'name', 'asc');
							if(!empty($category)) {
								foreach($category as $cat) {
									echo '<option value="'.$cat->id.'">'.$cat->name.'</option>';
								}
							} 
						?>
					</select>
				</div>

				<a href="javascript:;" class="button button-sliding-icon ripple-effect" onclick="ini_load('','');">Apply Filter <i class="icon-material-outline-arrow-right-alt"></i></a>

				<div class="clearfix"></div>

			</div>
		</div>
		<div class="col-xl-9 col-lg-8 content-left-offset">

			<h3 class="page-title">Search Results</h3>

			<!-- <div class="notify-box margin-top-15">
				<div class="switch-container">
					<label class="switch"><input type="checkbox"><span class="switch-button"></span><span class="switch-text">Turn on email alerts for this search</span></label>
				</div>

				<div class="sort-by">
					<span>Sort by:</span>
					<select class="selectpicker hide-tick">
						<option>Relevance</option>
						<option>Newest</option>
						<option>Oldest</option>
						<option>Random</option>
					</select>
				</div>
			</div> -->
			
			<!-- Freelancers List Container -->
			<div class="margin-top-35"></div>

			<div id="load_data"></div>

			<div class="row">
				<div class="col-sm-12">
					<div id="loadmore" class="text-center"></div><br/>
				</div>
			</div>
			
			<div class="clearfix"></div>

		</div>
	</div>
</div>

<div class="margin-top-80"></div>

<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script>
    $(function() {
        ini_load('', '');
    });

    function ini_load(x, y) {
        if(y === 'undefined' || y == '') {
             $('#load_data').html('<div class="col-xs-12"><h1 class="text-muted" style="text-align:center;"><i class="fa fa-spin icon-line-awesome-spinner fa-4x"></i></h1></div>');
        } else {
            $('#loadmore').html('<div class="col-xs-12"><h1 class="text-muted" style="text-align:center;"><i class="fa fa-spin icon-line-awesome-spinner fa-4x"></i></h1></div>');
        }

        var param;

        var keyword = $('#keyword').val();
		var location = $('#ilocation').val();

        var category_item = '';
        $('#category').each(function () {
            category_item += $(this).val();
        });

        if(keyword != '' && keyword != 'undefined') {param = '?search=' + keyword;} else {param = '?search=null';}
        if(location != '' && location != 'undefined') {param = param + '&location=' + location;}
        if(category != '' && category != 'undefined') {param = param + '&category=' + category_item;}

        $.ajax({
            url: '<?php echo base_url("doers/directory"); ?>/' + x + '/' + y + '/' + param,
            success: function(data) {
                var dt = JSON.parse(data);
                
                if(y === 'undefined' || y == '') {
                    $('#load_data').html(dt.item);
                } else {
                    $('#load_data').append(dt.item);
                }

                if(dt.more == 'yes') {
                    $('#loadmore').html('<div style="text-align:center;"><a href="javascript:;" class="button button-sliding-icon ripple-effect" onclick="ini_load(' + dt.limit + ', ' + dt.offset + ');"><i class="icon-feather-refresh-ccw"></i> Load More of ' + dt.left + '</a></div>');
                } else {
                    $('#loadmore').html('');
                }
			},
			complete: function() {
				$.getScript('<?php echo base_url(); ?>assets/js/custom.js');
			}
        });
	}

	function ftoggle() {
		$('#filter').toggle(200);
	}
</script>