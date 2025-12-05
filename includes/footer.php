</div> <!-- container -->
<!-- container -->

		 <footer class="footer container">

      <div class="well">
       <div class="row">
       
       		<div class="col-sm-6 text-center">
       		<br>
       			<strong>All Copyright &copy; Reserved by :  &reg;</strong>

       		</div>
       		<div class="col-sm-6 text-center">
       		<br>
       			<strong><a href="http://www.thesamzcreation.com/" target="_blank">
          
            Sam'z Creation (+92-345-7573667)
            </strong>
       		</div>

       </div>
      </div>
    </footer>
    
    
	  
<script type="text/javascript" src="js/jquery.canvasjs.min.js"></script>

	<!-- file input -->
	<script src="assests/plugins/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>	
	<script src="assests/plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>	
	<script src="assests/plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
	<script src="assests/plugins/fileinput/js/fileinput.min.js"></script>	


	<!-- DataTables -->
	<script src="assests/plugins/datatables/jquery.dataTables.min.js"></script>

  <script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  title: {
    text: "This Month Profit And Expenses"
  },
  subtitles: [{
    text: "<?=$thisMonth2?>"
  }],
  data: [{
    type: "pie",
    yValueFormatString: "#,##0.\"\"",
    indexLabel: "{label} ({y})",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>

      <script type="text/javascript">

$(document).ready(function() {
       // $("input:text:visible:first").focus();

// Map [Enter] key to work like the [Tab] key
// Daniel P. Clark 2014
 
// Catch the keydown for the entire document
$(document).keydown(function(e) {
 
  // Set self as the current item in focus
  var self = $(':focus'),
      // Set the form by the current item in focus
      form = self.parents('form:eq(0)'),
      focusable;
 
  // Array of Indexable/Tab-able items
  focusable = form.find('input,a,select,button,textarea,div[contenteditable=true]').filter(':visible');
 
  function enterKey(){
    if (e.which === 13 && !self.is('textarea,div[contenteditable=true]')) { // [Enter] key
 
      // If not a regular hyperlink/button/textarea
      if ($.inArray(self, focusable) && (!self.is('a,button'))){
        // Then prevent the default [Enter] key behaviour from submitting the form
        e.preventDefault();
      } // Otherwise follow the link/button as by design, or put new line in textarea
 
      // Focus on the next item (either previous or next depending on shift)
      focusable.eq(focusable.index(self) + (e.shiftKey ? -1 : 1)).focus();
      focusable.eq(focusable.index(self) + (e.shiftKey ? -1 : 1)).select();
 
      return false;
    }
  }
  // We need to capture the [Shift] key and check the [Enter] key either way.
  if (e.shiftKey) { enterKey() } else { enterKey() }
});

});

</script>
<script>
$('select[name="clauses"]').children('option:contains(OR)').val();

document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.ctrlKey && evt.keyCode == 191) {
        addRow();
    }
};




function myFunction(x) {
    $x(".group_tag_dynamic").hide('slow');
}
var flag=0;
  function loadProducts(){
    $('#tbody').css('opacity','0.2');
       setTimeout(function(){
               $('#tbody').css('opacity','1');
            $.ajax({
            
            type: "GET",
            url: "php_action/loadProducts.php",
            data: {
              'offset': flag,
              'limit': 50,
            },
            success: function(data){
              $('#tbody').append(data);
              flag += 50;
            }
          });

       },1000);
}
  $(document).on('click','#loadMore',function(){
   loadProducts();
  });
</script>
<link rel="stylesheet" href="css/dt-print.css">
<script src="js/dt-button.js"></script>
<script src="js/dt-print.js"></script>
<script src="js/dt-select-print.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
     $('.myTable').DataTable( {
      "order": [[ 0, "desc" ]],
        pageLength:50,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: 'Print all',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }
        ],
        select: true
    }  );

} );
  
</script>
 <script>
        document.onkeyup = function(e) {
  if (e.altKey && e.which == 82) {
    //p press
   $("#paid").focus();
   // subAmount();
  } 
  if (e.altKey && e.which == 83) {
    //r press
   $("#createOrderBtn").submit();

  } 
   if (e.altKey && e.which == 80) {
    //p press
    $("#printorder").click();
  

  }  if (e.altKey && e.which == 78) {
    //n press
    $("#neworder").click();
  

  } 



}; 
</script>

</body>
</html>