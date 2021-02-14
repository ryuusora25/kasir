<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="<?php echo base_url('js/scripts.js');?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/demo/chart-area-demo.js');?>"></script>
<script src="<?php echo base_url('assets/demo/chart-bar-demo.js');?>"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/demo/datatables-demo.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('js/jquery-3.5.1.js');?>"></script>
<script src="<?php echo base_url('js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/ui/jquery-ui.js');?>"></script>

<script type="text/javascript">
// $(document).ready(function(){
// var data=['a'];
// $('#id_menu').autocomplete({
// 	source: "<?php //echo base_url('admin/menus/guolek');?>",
// 	select:
// 	function(event, ui){
//              document.getElementById("id_menu").value = ui.item.id;
//   			document.getElementById("harga_menu").value = ui.item.jeneng;
// 	}
	
	
// });

// });

 $(function(){
     $('#id_menu').autocomplete({
     
	
         source: function(reqst, respn){
             $.ajax({
                 type: 'POST',
                 url: "<?php echo base_url('admin/menus/guolek') ?>",
                 dataType: 'json',
                 data: reqst,
                 success: function(data){
                     if(data.status = 'true'){
                         respn(data.message);
                     }
                 }
             });
         },
		 minLength:1,
		 delay:500, 
         select:
         function(event, ui){
             document.getElementById("id_menu").value = ui.item.id;
 			document.getElementById("nama_menu").value = ui.item.jeneng;
 			document.getElementById("harga_menu").value = ui.item.rego;
            
         }
		 
     });
	 
	 $( "#tipe" ).selectmenu();
 });
</script>

<script type='text/javascript'>
$(window).load(function(){
$("#jenis_bayar").change(function() {
			console.log($("#jenis_bayar option:selected").val());
			if ($("#jenis_bayar option:selected").val() == '1') {
				$('#pengutang').prop('hidden', 'true');
			} else {
				$('#pengutang').prop('hidden', false);
				document.getElementById("bayar").value = '0';
			}
		});
});
</script>


<script>
	function validate(evt) {
		var theEvent = evt || window.event;

		// Handle paste
		if (theEvent.type === 'paste') {
			key = event.clipboardData.getData('text/plain');
		} else {
			// Handle key press
			var key = theEvent.keyCode || theEvent.which;
			key = String.fromCharCode(key);
		}
		var regex = /[0-9]|\./;
		if (!regex.test(key)) {
			theEvent.returnValue = false;
			if (theEvent.preventDefault) theEvent.preventDefault();
		}
	}

</script>

<script>
	function sum() {
		var bayar = document.getElementById('bayar').value;
		var total = document.getElementById('total').value;
		if(bayar==0){
			document.getElementById('susuk').value = '-';
		}else{
		var result = parseInt(bayar) - parseInt(total);
		if (!isNaN(result)) {
			document.getElementById('susuk').value = result;
		}
	}
	}

</script>
