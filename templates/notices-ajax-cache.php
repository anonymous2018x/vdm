<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'notices';

		/* data for selected record, or defaults if none is selected */
		var data = {
			manager: <?php echo json_encode(array('id' => $rdata['manager'], 'value' => $rdata['manager'], 'text' => $jdata['manager'])); ?>,
			project: <?php echo json_encode(array('id' => $rdata['project'], 'value' => $rdata['project'], 'text' => $jdata['project'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for manager */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'manager' && d.id == data.manager.id)
				return { results: [ data.manager ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for project */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'project' && d.id == data.project.id)
				return { results: [ data.project ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

