<footer class="text-center">
  <div class="mb-2">
    <small>
      NovelX © 2021 Dashboard.
    </small>
  </div>
</footer>
</section>

<div id="back-top" style="display: none;">
  <a title="Go to Top" href="#">
    <i class="fa fa-arrow-up" aria-hidden="true"></i>
  </a>  
</div>
<!-- footer  -->
<!-- bootstarp js -->
<script src="<?=BASEURL?>assets/js/bootstrap.min.js"></script>
<!-- sidebar menu  -->
<script src="<?=BASEURL?>assets/js/metisMenu.js"></script>
<!-- custom js --> 


<script type="text/javascript" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="<?=BASEURL?>assets/js/chart.min.js"></script>
<script src="<?=BASEURL?>assets/js/charts-defaults.4032ce71.js"></script>
<!--<script src="<?=BASEURL?>assets/js/charts-home.a757f7e5.js"></script> -->
<script src="<?=BASEURL?>assets/js/custom.js"></script>
<script>
$(document).ready(function() {
     $(".readonly").keydown(function(e){
        e.preventDefault();
    });
    
    $('form').submit(function(){
    $('input[type=submit]', this).attr('disabled', 'disabled');
    $('button[type=submit]', this).attr('disabled', 'disabled');
});
    
    $('#novelx_table').DataTable();
    
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
        });
      }, 2000); 
} );




  new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [2478,5267,734,784,433]
      }]
    },
    options: {
      title: {
        display: true,
        text: ' '
      }
    }
  });
  new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
      {
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [2478,5267,734,784,433]
      }
      ]
    },
    options: {
      title: {
        display: true,
        text: ' '
      }
    }
  });
  $(".rotate").click(function () {
    $(this).toggleClass("down");
  })
</script>
</body> 
</html>
