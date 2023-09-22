<?php include 'header.php';?>


    <style>
          .bg-404{
			height: 100%;
			position: relative;
			background: #eee;
			background: -moz-linear-gradient(top, rgba(232,247,252,1) 0%, rgba(249,249,249,1) 100%); /* FF3.6-15 */
			background: -webkit-linear-gradient(top, rgba(232,247,252,1) 0%,rgba(249,249,249,1) 100%); /* Chrome10-25,Safari5.1-6 */
			background: linear-gradient(to bottom, rgba(232,247,252,1) 0%,rgba(249,249,249,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8f7fc', endColorstr='#f9f9f9',GradientType=0 ); /* IE6-9 */
		}

  .bottom-copy{
			position: fixed;
			bottom: 0;
			left: 0;
			right: 0;
			min-height: 140px;
			text-align: center;
		}

		
		.gears-grd1{
			stop-color:#4fc1ea; stop-opacity:1
		}
		.gears-grd2{
			stop-color:#6435c9; stop-opacity:1
		}
		
		.gears-img{
		    position:absolute;
			text-align: center;
			top:50%;
			right: 10vw;
			bottom: 10vh;
			width: 80%;
		}
		.gears-img img{
			max-width: 100%;
		}

		.machine {
			width: 60vmin;
		}

		.small-shadow, .medium-shadow, .large-shadow {
			fill: rgba(0, 0, 0, 0.05); }

		.small {
			-webkit-animation: counter-rotation 2.5s infinite linear;
			-moz-animation: counter-rotation 2.5s infinite linear;
			-o-animation: counter-rotation 2.5s infinite linear;
			animation: counter-rotation 2.5s infinite linear;
			-webkit-transform-origin: 100.136px 225.345px;
			-ms-transform-origin: 100.136px 225.345px;
			transform-origin: 100.136px 225.345px; }

		.small-shadow {
			-webkit-animation: counter-rotation 2.5s infinite linear;
			-moz-animation: counter-rotation 2.5s infinite linear;
			-o-animation: counter-rotation 2.5s infinite linear;
			animation: counter-rotation 2.5s infinite linear;
			-webkit-transform-origin: 110.136px 235.345px;
			-ms-transform-origin: 110.136px 235.345px;
			transform-origin: 110.136px 235.345px; }

		.medium {
			-webkit-animation: rotation 3.75s infinite linear;
			-moz-animation: rotation 3.75s infinite linear;
			-o-animation: rotation 3.75s infinite linear;
			animation: rotation 3.75s infinite linear;
			-webkit-transform-origin: 254.675px 379.447px;
			-ms-transform-origin: 254.675px 379.447px;
			transform-origin: 254.675px 379.447px; }

		.medium-shadow {
			-webkit-animation: rotation 3.75s infinite linear;
			-moz-animation: rotation 3.75s infinite linear;
			-o-animation: rotation 3.75s infinite linear;
			animation: rotation 3.75s infinite linear;
			-webkit-transform-origin: 264.675px 389.447px;
			-ms-transform-origin: 264.675px 389.447px;
			transform-origin: 264.675px 389.447px; }

		.large {
			-webkit-animation: counter-rotation 5s infinite linear;
			-moz-animation: counter-rotation 5s infinite linear;
			-o-animation: counter-rotation 5s infinite linear;
			animation: counter-rotation 5s infinite linear;
			-webkit-transform-origin: 461.37px 173.694px;
			-ms-transform-origin: 461.37px 173.694px;
			transform-origin: 461.37px 173.694px; }

		.large-shadow {  
			-webkit-animation: counter-rotation 5s infinite linear;
			-moz-animation: counter-rotation 5s infinite linear;
			-o-animation: counter-rotation 5s infinite linear;
			animation: counter-rotation 5s infinite linear;
			-webkit-transform-origin: 471.37px 183.694px;
			-ms-transform-origin: 471.37px 183.694px;
			transform-origin: 471.37px 183.694px; }

		@-webkit-keyframes rotation {
			from {-webkit-transform: rotate(0deg);}
			to   {-webkit-transform: rotate(359deg);}
		}
		@-moz-keyframes rotation {
			from {-moz-transform: rotate(0deg);}
			to   {-moz-transform: rotate(359deg);}
		}
		@-o-keyframes rotation {
			from {-o-transform: rotate(0deg);}
			to   {-o-transform: rotate(359deg);}
		}
		@keyframes rotation {
			from {transform: rotate(0deg);}
			to   {transform: rotate(359deg);}
		}

		@-webkit-keyframes counter-rotation {
			from {-webkit-transform: rotate(359deg);}
			to   {-webkit-transform: rotate(0deg);}
		}
		@-moz-keyframes counter-rotation {
			from {-moz-transform: rotate(359deg);}
			to   {-moz-transform: rotate(0deg);}
		}
		@-o-keyframes counter-rotation {
			from {-o-transform: rotate(359deg);}
			to   {-o-transform: rotate(0deg);}
		}
		@keyframes counter-rotation {
			from {transform: rotate(359deg);}
			to   {transform: rotate(0deg);}
		}

	
		.maintenance-text{
		    color:#fff !important;
		    font-size:50px !important;
		    font-weight:700 !important;
		    text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5);
		}
		@media screen and (max-width:500px){
		    	.maintenance-text{
		    font-size:25px !important;
		}
        		.machine {
            width: 65vmin !important;
        }
        .gear-img-container{
		    margin-left:50px !important;
		}
		.gears-img{
		    top: 55% !important;
		}
	
		}
		
		.rocket{
    width: 250px;
    position: absolute;
    right: 10%;
    bottom: 0;
    animation: rocket 4s linear infinite;

}
@keyframes rocket{
    0%{
        bottom: 0;
        opacity: 0;
    }
    100%{
        bottom: 105%;
        opacity: 1;
    }
}
.bth-btn, .bth-btn:hover{
    background-color:#00b074 !important;
    border-color:#00b074 !important;
}
@media screen and (max-width:991px){
    	.server-boy{
		    margin-top: -23px !important;
		}
		.gear-img-container{
		    margin-top:25px !important;
		}
}
    </style>




            <div class="container-fluid content-inner pb-5">
                
                
                  <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 pt-0">
                            <div class="mb-5 text-white-50">
                                <h4 style="font-size: 28px;" class="mb-3">Exciting Updates Ahead! 🚀</h4>
                                <h5 class="text-dark">"
We're enhancing your deposit experience to bring you even better options. Stay tuned, and we'll be back shortly!"</h5>
                                <p class="fs-14 mb-0 mt-3" style="color:#6f42c1;">Please check back in sometime...!!</p>
                            </div>
                            <div class="row mb-5">
                                <div class="col-xl-4 col-lg-4 col-12">
                                    <div class="gear-img-container">
                                        <div class="gears-img sm-hide">
                                    			<svg class="machine" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 645 526" fill="url(#grad1)">
                                      <defs>
                                        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                                          <stop offset="0%" style="stop-color: #180B7C"></stop>
                                          <stop offset="100%" style="stop-color: #8E87C0"></stop>
                                        </linearGradient>
                                      </defs>
                                      <g>
                                        <path x="-173,694" y="-173,694" class="large-shadow" d="M645 194v-21l-29-4c-1-10-3-19-6-28l25-14 -8-19 -28 7c-5-8-10-16-16-24L602 68l-15-15 -23 17c-7-6-15-11-24-16l7-28 -19-8 -14 25c-9-3-18-5-28-6L482 10h-21l-4 29c-10 1-19 3-28 6l-14-25 -19 8 7 28c-8 5-16 10-24 16l-23-17L341 68l17 23c-6 7-11 15-16 24l-28-7 -8 19 25 14c-3 9-5 18-6 28l-29 4v21l29 4c1 10 3 19 6 28l-25 14 8 19 28-7c5 8 10 16 16 24l-17 23 15 15 23-17c7 6 15 11 24 16l-7 28 19 8 14-25c9 3 18 5 28 6l4 29h21l4-29c10-1 19-3 28-6l14 25 19-8 -7-28c8-5 16-10 24-16l23 17 15-15 -17-23c6-7 11-15 16-24l28 7 8-19 -25-14c3-9 5-18 6-28L645 194zM471 294c-61 0-110-49-110-110S411 74 471 74s110 49 110 110S532 294 471 294z"></path>
                                      </g>
                                      <g>
                                        <path x="-136,996" y="-136,996" class="medium-shadow" d="M402 400v-21l-28-4c-1-10-4-19-7-28l23-17 -11-18L352 323c-6-8-13-14-20-20l11-26 -18-11 -17 23c-9-4-18-6-28-7l-4-28h-21l-4 28c-10 1-19 4-28 7l-17-23 -18 11 11 26c-8 6-14 13-20 20l-26-11 -11 18 23 17c-4 9-6 18-7 28l-28 4v21l28 4c1 10 4 19 7 28l-23 17 11 18 26-11c6 8 13 14 20 20l-11 26 18 11 17-23c9-4 18-6 28-7l4 28h21l4-28c10-1 19-4 28-7l17 23 18-11 -11-26c8-6 14-13 20-20l26 11 11-18 -23-17c4-9 6-18 7-28L402 400zM265 463c-41 0-74-33-74-74 0-41 33-74 74-74 41 0 74 33 74 74C338 430 305 463 265 463z"></path>
                                      </g>
                                      <g>
                                        <path x="-100,136" y="-100,136" class="small-shadow" d="M210 246v-21l-29-4c-2-10-6-18-11-26l18-23 -15-15 -23 18c-8-5-17-9-26-11l-4-29H100l-4 29c-10 2-18 6-26 11l-23-18 -15 15 18 23c-5 8-9 17-11 26L10 225v21l29 4c2 10 6 18 11 26l-18 23 15 15 23-18c8 5 17 9 26 11l4 29h21l4-29c10-2 18-6 26-11l23 18 15-15 -18-23c5-8 9-17 11-26L210 246zM110 272c-20 0-37-17-37-37s17-37 37-37c20 0 37 17 37 37S131 272 110 272z"></path>
                                      </g>
                                      <g>
                                        <path x="-100,136" y="-100,136" class="small" d="M200 236v-21l-29-4c-2-10-6-18-11-26l18-23 -15-15 -23 18c-8-5-17-9-26-11l-4-29H90l-4 29c-10 2-18 6-26 11l-23-18 -15 15 18 23c-5 8-9 17-11 26L0 215v21l29 4c2 10 6 18 11 26l-18 23 15 15 23-18c8 5 17 9 26 11l4 29h21l4-29c10-2 18-6 26-11l23 18 15-15 -18-23c5-8 9-17 11-26L200 236zM100 262c-20 0-37-17-37-37s17-37 37-37c20 0 37 17 37 37S121 262 100 262z"></path>
                                      </g>
                                      <g>
                                        <path x="-173,694" y="-173,694" class="large" d="M635 184v-21l-29-4c-1-10-3-19-6-28l25-14 -8-19 -28 7c-5-8-10-16-16-24L592 58l-15-15 -23 17c-7-6-15-11-24-16l7-28 -19-8 -14 25c-9-3-18-5-28-6L472 0h-21l-4 29c-10 1-19 3-28 6L405 9l-19 8 7 28c-8 5-16 10-24 16l-23-17L331 58l17 23c-6 7-11 15-16 24l-28-7 -8 19 25 14c-3 9-5 18-6 28l-29 4v21l29 4c1 10 3 19 6 28l-25 14 8 19 28-7c5 8 10 16 16 24l-17 23 15 15 23-17c7 6 15 11 24 16l-7 28 19 8 14-25c9 3 18 5 28 6l4 29h21l4-29c10-1 19-3 28-6l14 25 19-8 -7-28c8-5 16-10 24-16l23 17 15-15 -17-23c6-7 11-15 16-24l28 7 8-19 -25-14c3-9 5-18 6-28L635 184zM461 284c-61 0-110-49-110-110S401 64 461 64s110 49 110 110S522 284 461 284z"></path>
                                      </g>
                                      <g>
                                        <path x="-136,996" y="-136,996" class="medium" d="M392 390v-21l-28-4c-1-10-4-19-7-28l23-17 -11-18L342 313c-6-8-13-14-20-20l11-26 -18-11 -17 23c-9-4-18-6-28-7l-4-28h-21l-4 28c-10 1-19 4-28 7l-17-23 -18 11 11 26c-8 6-14 13-20 20l-26-11 -11 18 23 17c-4 9-6 18-7 28l-28 4v21l28 4c1 10 4 19 7 28l-23 17 11 18 26-11c6 8 13 14 20 20l-11 26 18 11 17-23c9 4 18 6 28 7l4 28h21l4-28c10-1 19-4 28-7l17 23 18-11 -11-26c8-6 14-13 20-20l26 11 11-18 -23-17c4-9 6-18 7-28L392 390zM255 453c-41 0-74-33-74-74 0-41 33-74 74-74 41 0 74 33 74 74C328 420 295 453 255 453z"></path>
                                      </g>
                                      <g>
                                        <path x="-100,136" y="-100,136" class="small" d="M200 246v-21l-29-4c-2-10-6-18-11-26l18-23 -15-15 -23 18c-8-5-17-9-26-11l-4-29H90l-4 29c-10 2-18 6-26 11l-23-18 -15 15 18 23c-5 8-9 17-11 26L0 225v21l29 4c2 10 6 18 11 26l-18 23 15 15 23-18c8 5 17 9 26 11l4 29h21l4-29c10-2 18-6 26-11l23 18 15-15 -18-23c5-8 9-17 11-26L200 246zM100 272c-20 0-37-17-37-37s17-37 37-37c20 0 37 17 37 37S121 272 100 272z"></path>
                                      </g>
                                    </svg>
                                    
                                    		</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                
             </div>    









<?php include 'footer.php';?>