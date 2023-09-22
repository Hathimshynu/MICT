<?php
$this->load->view('header');    
$comp = $this->db->get('setup')->row_array();            
?>
	<div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
         
			<section class="mb-3 mb-lg-5 ">
            <div class="row mr-rt">
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card-widget h-100">
                  <div class="card-widget-body">
                    <div class="dot me-3 bg-indigo"></div>
                    <div class="text">
                      <h6 class="mb-0">Data consumed</h6><span class="text-gray-500">145,14 GB</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-indigo"><i class="fa fa-server" aria-hidden="true"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card-widget h-100">
                  <div class="card-widget-body">
                    <div class="dot me-3 bg-green"></div>
                    <div class="text">
                      <h6 class="mb-0">Open cases</h6><span class="text-gray-500">32</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-green"><i class="fa fa-archive" aria-hidden="true"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card-widget h-100">
                  <div class="card-widget-body">
                    <div class="dot me-3 bg-blue"></div>
                    <div class="text">
                      <h6 class="mb-0">Work orders</h6><span class="text-gray-500">400</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-blue"><i class="fa fa-building-o" aria-hidden="true"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card-widget h-100">
                  <div class="card-widget-body">
                    <div class="dot me-3 bg-red"></div>
                    <div class="text">
                      <h6 class="mb-0">New invoices</h6><span class="text-gray-500">123</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-red"><i class="fa fa-print" aria-hidden="true"></i></div>
                </div>
              </div>
            </div>
          </section>
		  
		  <section class="mb-4 mb-lg-5">
            <h2 class="section-heading section-heading-ms mb-4 mb-lg-5">Finances 💰</h2>
            <div class="row">
              <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="card h-100">
                  <div class="card-header">
                    <h4 class="card-heading">Your Account Balance</h4>
                  </div>
                  <div class="card-body">
                    <div class="chart-holder w-100"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <canvas id="lineChart1" style="display: block; width: 703px; height: 351px;" width="703" height="351" class="chartjs-render-monitor"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="h-50 pb-4 pb-lg-2">
                  <div class="card h-100">
                    <div class="card-body d-flex">
                      <div class="row w-100 align-items-center">
                        <div class="col-sm-5 mb-4 mb-sm-0">
                          <h2 class="mb-0 d-flex align-items-center"><span>86.4</span><span class="dot bg-green d-inline-block ms-3"></span></h2><span class="text-muted text-uppercase small">Work hours</span>
                          <hr><small class="text-muted">Hours worked this month</small>
                        </div>
                        <div class="col-sm-7">
                          <div class="progress-circle over50 p77"> 
                            <span>77%</span>
                            <div class="left-half-clipper">
                             <div class="first50-bar"></div>
                             <div class="value-bar"></div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
                <div class="h-50 pt-lg-2">
                  <div class="card h-100">
                    <div class="card-body d-flex">
                      <div class="row w-100 align-items-center">
                        <div class="col-sm-5 mb-4 mb-sm-0">
                          <h2 class="mb-0 d-flex align-items-center"><span>325</span><span class="dot bg-indigo d-inline-block ms-3"></span></h2><span class="text-muted text-uppercase small">Tasks Completed</span>
                          <hr><small class="text-muted">Tasks Completed this months</small>
                        </div>
                        <div class="col-sm-7"> 
						 <div class="progress-circle p33"> 
						 <span>33%</span>
						   <div class="left-half-clipper">
							  <div class="first50-bar"></div>
							  <div class="value-bar"></div>
						   </div>
						</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
		  
		  <section class="mb-4 mb-lg-5">
		  <div class="row text-dark">
              <div class="col-md-6 col-xl-6 mb-4">
				 <div class="card inner-pad"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div> 
				 <div class="card-header">
                    <h4 class="card-heading">Doughnut Chart</h4>
                  </div><br>
					<canvas id="doughnut-chart" width="625" height="351" class="chartjs-render-monitor" style="display: block; width: 625px; height: 351px;"></canvas>
				 </div>
			  </div>
			  <div class="col-md-6 col-xl-6 mb-4">
				 <div class="card inner-pad"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div> 
				  <div class="card-header">
                    <h4 class="card-heading">Pie Chart</h4>					 
                  </div><br>
				  <canvas id="pie-chart" width="625" height="351" class="chartjs-render-monitor" style="display: block; width: 625px; height: 351px;"></canvas>
				 </div>
			  </div>
		  </div>
		  </section>
		  
		  <section class="mb-4 mb-lg-5">
            <h2 class="section-heading section-heading-ms mb-4 mb-lg-5">Linked Cards 💳 </h2>
            <div class="row text-dark">
              <div class="col-md-6 col-xl-4 mb-4">
                <div class="card credit-card bg-hover-gradient-indigo">
                  <div class="credict-card-content">
                    <div class="h1 mb-3 mb-lg-1"><i class="fa fa-cc-visa" aria-hidden="true"></i></div>
                    <div class="credict-card-bottom">
                      <div class="text-uppercase flex-shrink-0 me-1 mb-1">
                        <div class="fw-bold">Card Number</div><small class="text-gray-500">1245 1478 1362 6985</small>
                      </div>
                      <h4 class="mb-1">$417.78</h4>
                    </div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-md-6 col-xl-4 mb-4">
                <div class="card credit-card bg-hover-gradient-blue">
                  <div class="credict-card-content">
                    <div class="h1 mb-3 mb-lg-1"><i class="fa fa-cc-mastercard" aria-hidden="true"></i></div>
                    <div class="credict-card-bottom">
                      <div class="text-uppercase flex-shrink-0 me-1 mb-1">
                        <div class="fw-bold">Card Number</div><small class="text-gray-500">1245 1478 1362 6985</small>
                      </div>
                      <h4 class="mb-1">$224.17</h4>
                    </div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
              <div class="col-md-6 col-xl-4 mb-4">
                <div class="card credit-card bg-hover-gradient-green">
                  <div class="credict-card-content">
                    <div class="h1 mb-3 mb-lg-1"><i class="fa fa-cc-visa" aria-hidden="true"></i></div>
                    <div class="credict-card-bottom">
                      <div class="text-uppercase flex-shrink-0 me-1 mb-1">
                        <div class="fw-bold">Card Number</div><small class="text-gray-500">1245 1478 1362 6985</small>
                      </div>
                      <h4 class="mb-1">$568.00</h4>
                    </div>
                  </div><a class="stretched-link" href="#"></a>
                </div>
              </div>
            </div>
          </section>
		  
		  <section class="mb-4">
            <h2 class="section-heading section-heading-ms mb-4 mb-lg-5">People 👩‍💻</h2>
			<div class="outer">
			<div class="inner>
            <div class=" row"="">
              <div class="col-sm-6 col-xl-12"><a class="message card px-5 py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset" href="#">
                  <div class="row">
                    <div class="col-xl-3 d-flex align-items-center flex-column flex-xl-row text-center text-md-left"><strong class="h5 mb-0">24<sup class="text-xs text-gray-500 font-weight-normal ms-1">Apr</sup></strong><img class="avatar avatar-md p-1 mx-3 my-2 my-xl-0" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-2/img/avatar-1.jpg" alt="..." style="max-width: 3rem">
                      <h6 class="mb-0">Jason Maxwell</h6>
                    </div>
                    <div class="col-xl-9 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                      <div class="bg-gray-200 rounded-pill px-4 py-1 me-0 me-xl-3 mt-3 mt-xl-0 text-sm text-dark exclude">User testing</div>
                      <p class="mb-0 mt-3 mt-lg-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                    </div>
                  </div></a></div>
              <div class="col-sm-6 col-xl-12"><a class="message card px-5 py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset" href="#">
                  <div class="row">
                    <div class="col-xl-3 d-flex align-items-center flex-column flex-xl-row text-center text-md-left"><strong class="h5 mb-0">24<sup class="text-xs text-gray-500 font-weight-normal ms-1">Nov</sup></strong><img class="avatar avatar-md p-1 mx-3 my-2 my-xl-0" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-2/img/avatar-2.jpg" alt="..." style="max-width: 3rem">
                      <h6 class="mb-0">Sam Andy</h6>
                    </div>
                    <div class="col-xl-9 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                      <div class="bg-gray-200 rounded-pill px-4 py-1 me-0 me-xl-3 mt-3 mt-xl-0 text-sm text-dark exclude">Web Developer</div>
                      <p class="mb-0 mt-3 mt-lg-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                    </div>
                  </div></a></div>
              <div class="col-sm-6 col-xl-12"><a class="message card px-5 py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset" href="#">
                  <div class="row">
                    <div class="col-xl-3 d-flex align-items-center flex-column flex-xl-row text-center text-md-left"><strong class="h5 mb-0">17<sup class="text-xs text-gray-500 font-weight-normal ms-1">Aug</sup></strong><img class="avatar avatar-md p-1 mx-3 my-2 my-xl-0" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-2/img/avatar-3.jpg" alt="..." style="max-width: 3rem">
                      <h6 class="mb-0">Margret Peter</h6>
                    </div>
                    <div class="col-xl-9 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                      <div class="bg-gray-200 rounded-pill px-4 py-1 me-0 me-xl-3 mt-3 mt-xl-0 text-sm text-dark exclude">Analysis Agent</div>
                      <p class="mb-0 mt-3 mt-lg-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                    </div>
                  </div></a></div>
              <div class="col-sm-6 col-xl-12"><a class="message card px-5 py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset" href="#">
                  <div class="row">
                    <div class="col-xl-3 d-flex align-items-center flex-column flex-xl-row text-center text-md-left"><strong class="h5 mb-0">15<sup class="text-xs text-gray-500 font-weight-normal ms-1">Sep</sup></strong><img class="avatar avatar-md p-1 mx-3 my-2 my-xl-0" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-2/img/avatar-4.jpg" alt="..." style="max-width: 3rem">
                      <h6 class="mb-0">Jason Doe</h6>
                    </div>
                    <div class="col-xl-9 d-flex align-items-center flex-column flex-xl-row text-center text-md-left">
                      <div class="bg-gray-200 rounded-pill px-4 py-1 me-0 me-xl-3 mt-3 mt-xl-0 text-sm text-dark exclude">User testing</div>
                      <p class="mb-0 mt-3 mt-lg-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                    </div>
                  </div></a></div>
            </div>
			</div>
			</section> 
			<br>
			<section class="mb-4">
            <h2 class="section-heading section-heading-ms mb-4 mb-lg-5">Investment</h2>
			 
			<div class="outer">
			<div class="inner>
            <div class="row">  
				<div class="col-sm-12 col-xl-12"><a class="message card py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset" href="#">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="inner-list tx-c">
							<h6>Amount</h6>
							<p class="d-input1"><strong>$ 45000</strong></p>
						</div>
						<hr class="no-l"/>
					</div>
					<hr>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-50">
						<div class="inner-list no-l t-l">
							<h6>Day:</h6>
							<p class="d-input"><strong>01</strong></p>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-51">
						<div class="inner-list no-l t-r">
								<h6>ROI:</h6>
								<p class="d-input"><strong>$ 250</strong></p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 w-50">
						<div class="inner-list no-l t-l">
								<h6>Type:</h6>  
								<span class="input-orange">monthly</span>
						</div>					
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-51">
						<div class="inner-list no-l t-r">
								<h6>Date:</h6> 
								<p><strong>20/8/2021</strong></p>
						</div>	
					</div>
                  </div>
				  </a>
				  </div>
				  <div class="col-sm-12 col-xl-12"><a class="message card py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset" href="#">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="inner-list tx-c">
							<h6>Amount</h6>
							<p class="d-input1"><strong>$ 45000</strong></p>
						</div>
						<hr class="no-l"/>
					</div>
					<hr>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-50">
						<div class="inner-list no-l t-l">
							<h6>Day:</h6>
							<p class="d-input"><strong>01</strong></p>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-51">
						<div class="inner-list no-l t-r">
								<h6>ROI:</h6>
								<p class="d-input"><strong>$ 250</strong></p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 w-50">
						<div class="inner-list no-l t-l">
								<h6>Type:</h6>  
								<span class="input-green">weekly</span>
						</div>					
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-51">
						<div class="inner-list no-l t-r">
								<h6>Date:</h6> 
								<p><strong>20/8/2021</strong></p>
						</div>	
					</div>
                  </div>
				  </a>
				  </div>
				  
				  <div class="col-sm-12 col-xl-12"><a class="message card py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset" href="#">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="inner-list tx-c">
							<h6>Amount</h6>
							<p class="d-input1"><strong>$ 45000</strong></p>
						</div>
						<hr class="no-l"/>
					</div>
					<hr>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-50">
						<div class="inner-list no-l t-l">
							<h6>Day:</h6>
							<p class="d-input"><strong>01</strong></p>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-51">
						<div class="inner-list no-l t-r">
								<h6>ROI:</h6>
								<p class="d-input"><strong>$ 250</strong></p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 w-50">
						<div class="inner-list no-l t-l">
								<h6>Type:</h6>  
								<span class="input-orange">monthly</span>
						</div>					
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-51">
						<div class="inner-list no-l t-r">
								<h6>Date:</h6> 
								<p><strong>20/8/2021</strong></p>
						</div>	
					</div>
                  </div>
				  </a>
				  </div>
				   <div class="col-sm-12 col-xl-12"><a class="message card py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset" href="#">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="inner-list tx-c">
							<h6>Amount</h6>
							<p class="d-input1"><strong>$ 45000</strong></p>
						</div>
						<hr class="no-l"/>
					</div>
					<hr>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-50">
						<div class="inner-list no-l t-l">
							<h6>Day:</h6>
							<p class="d-input"><strong>01</strong></p>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-51">
						<div class="inner-list no-l t-r">
								<h6>ROI:</h6>
								<p class="d-input"><strong>$ 250</strong></p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 w-50">
						<div class="inner-list no-l t-l">
								<h6>Type:</h6>  
								<span class="input-green">weekly</span>
						</div>					
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-51">
						<div class="inner-list no-l t-r">
								<h6>Date:</h6> 
								<p><strong>20/8/2021</strong></p>
						</div>	
					</div>
                  </div>
				  </a>
				  </div>
				  <div class="col-sm-12 col-xl-12"><a class="message card py-3 mb-4 bg-hover-gradient-primary text-decoration-none text-reset" href="#">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="inner-list tx-c">
							<h6>Amount</h6>
							<p class="d-input1"><strong>$ 45000</strong></p>
						</div>
						<hr class="no-l"/>
					</div>
					<hr>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-50">
						<div class="inner-list no-l t-l">
							<h6>Day:</h6>
							<p class="d-input"><strong>01</strong></p>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-51">
						<div class="inner-list no-l t-r">
								<h6>ROI:</h6>
								<p class="d-input"><strong>$ 250</strong></p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 w-50">
						<div class="inner-list no-l t-l">
								<h6>Type:</h6>  
								<span class="input-orange">monthly</span>
						</div>					
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w-51">
						<div class="inner-list no-l t-r">
								<h6>Date:</h6> 
								<p><strong>20/8/2021</strong></p>
						</div>	
					</div>
                  </div>
				  </a>
				  </div>
            </div>
			</div>
			</section> 
		</div>
    </div> 
	
<?php $this->load->view('footer');?>