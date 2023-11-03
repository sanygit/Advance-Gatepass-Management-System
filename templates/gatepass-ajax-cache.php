<script>
	$j(function(){
		var tn = 'gatepass';

		/* data for selected record, or defaults if none is selected */
		var data = {
			gate: { id: '<?php echo $rdata['gate']; ?>', value: '<?php echo $rdata['gate']; ?>', text: '<?php echo $jdata['gate']; ?>' },
			invited_by: { id: '<?php echo $rdata['invited_by']; ?>', value: '<?php echo $rdata['invited_by']; ?>', text: '<?php echo $jdata['invited_by']; ?>' },
			staff: { id: '<?php echo $rdata['staff']; ?>', value: '<?php echo $rdata['staff']; ?>', text: '<?php echo $jdata['staff']; ?>' },
			individual: { id: '<?php echo $rdata['individual']; ?>', value: '<?php echo $rdata['individual']; ?>', text: '<?php echo $jdata['individual']; ?>' },
			group: { id: '<?php echo $rdata['group']; ?>', value: '<?php echo $rdata['group']; ?>', text: '<?php echo $jdata['group']; ?>' },
			vehicle: { id: '<?php echo $rdata['vehicle']; ?>', value: '<?php echo $rdata['vehicle']; ?>', text: '<?php echo $jdata['vehicle']; ?>' },
			luggage: { id: '<?php echo $rdata['luggage']; ?>', value: '<?php echo $rdata['luggage']; ?>', text: '<?php echo $jdata['luggage']; ?>' }
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for gate */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'gate' && d.id == data.gate.id)
				return { results: [ data.gate ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for invited_by */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'invited_by' && d.id == data.invited_by.id)
				return { results: [ data.invited_by ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for staff */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'staff' && d.id == data.staff.id)
				return { results: [ data.staff ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for individual */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'individual' && d.id == data.individual.id)
				return { results: [ data.individual ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for group */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'group' && d.id == data.group.id)
				return { results: [ data.group ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for vehicle */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'vehicle' && d.id == data.vehicle.id)
				return { results: [ data.vehicle ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for luggage */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'luggage' && d.id == data.luggage.id)
				return { results: [ data.luggage ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

