<link rel="stylesheet" href="<?=BASEURL?>assets/css/chat.css" />
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
$userdata = $this->session->userdata;

if ($this->session->flashdata('success_message')) { ?>
<div style="z-index: 999; right: 0; top: 80px; position: absolute;"
    class="alert alert-success alert-dismissible fade show">
    <?php echo $this->session->flashdata('success_message');?>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
<?php } 
if ($this->session->flashdata('error_message')) { ?>
<div style="z-index: 999; right: 0; top: 80px; position: absolute;"
    class="alert alert-danger alert-dismissible fade show">
    <?php echo $this->session->flashdata('error_message');?>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
<?php } ?>
<div class="main_content_iner overly_inner ">
    <!-- <div class="container-fluid p-0 ">

        <div class="page-breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Messages</li>
            </ul>
        </div>

    </div> -->
    <div class="wrapper">
        <div class="container">
            <div class="row  bg-white ">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                    <div class="left">
                    <?php $messages = $this->db->order_by('id','desc')->group_by('m_from','desc')->where('m_from!=',1)->limit(5)->get('messages')->result_array();?>

                        <ul class="people" style="min-width:250px;min-height:600px;">
                        <?php $count=1; foreach ($messages as $key => $n) { ?>
                            <li class="person" data-chat="person<?=$n['m_from'];?>" style="min-height:80px;">
                            <?php $user = $this->admin->get_row_data('user_role','user_role_id',$n['m_from']);
                            $profile =$this->admin->get_row_data('profile','profile_id',$user['user_role_id'])?>

                                <img src="<?=PROFILEURL.$profile['pimage']?>" alt="" />
                                <span class="name"><?=$user['username']?></span>
                                <span class="time">1:44 PM</span>
                                <!-- <span class="preview">I've forgotten how it felt before</span> -->
                            </li>
                            <?php }?>

                            <!-- <li class="person" data-chat="person3">
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/louis-ck.jpeg" alt="" />
                                <span class="name">Louis CK</span>
                                <span class="time">2:09 PM</span>
                                <span class="preview">But we’re probably gonna need a new carpet.</span>
                            </li>
                            <li class="person" data-chat="person4">
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/bo-jackson.jpg" alt="" />
                                <span class="name">Bo Jackson</span>
                                <span class="time">2:09 PM</span>
                                <span class="preview">It’s not that bad...</span>
                            </li>
                            <li class="person" data-chat="person5">
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/michael-jordan.jpg"
                                    alt="" />
                                <span class="name">Michael Jordan</span>
                                <span class="time">2:09 PM</span>
                                <span class="preview">Wasup for the third time like is you blind bitch</span>
                            </li>
                            <li class="person" data-chat="person6">
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/drake.jpg" alt="" />
                                <span class="name">Drake</span>
                                <span class="time">2:09 PM</span>
                                <span class="preview">howdoyoudoaspace</span>
                            </li>
                            <li class="person" data-chat="person6">
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/drake.jpg" alt="" />
                                <span class="name">Drake</span>
                                <span class="time">2:09 PM</span>
                                <span class="preview">howdoyoudoaspace</span>
                            </li>
                            <li class="person" data-chat="person6">
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/drake.jpg" alt="" />
                                <span class="name">Drake</span>
                                <span class="time">2:09 PM</span>
                                <span class="preview">howdoyoudoaspace</span>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 c-scroll pb-5">
                    <div class="right">
                    <div class="top"><span>To: <span class="name" id="username"></span></span></div>

                    <?php $admin_messages = $this->admin->get_tabledata('messages'); 
                      foreach ($admin_messages as $key => $a) { 
                             ?>

                          

                        <div class="chat" data-chat="person<?=$a['m_from']?>">
                            <div class="convo">
                                    <!-- <div class="conversation-start">
                                        <span>Today, 5:38 PM</span>
                                    </div> -->
                                <?php 
                                $message = $this->db->where("m_from",$a['m_from'])->get('messages')->result_array(); 
                                foreach ($message as $key => $m) { 

                                 if(!empty($m['message'])) { ?>
                                <div class="bubble you">
                                    <?=$m['message']?>
                                </div>
                                <?php } if(!empty($m['replay'])) { ?>
                                <div class="bubble me">
                                    <?=$m['replay']?>
                                </div>
                                <?php } }?>
                                
                            </div>
                        </div>
                        <?php  }?>                        
                        <form action="<?=BASEURL?>replay_message" method="POST">

                        <div class="input-group c-send">
                        <input type="hidden" class="form-control" name="user_id" value="<?=$userdata['userid']?>" required>
                        <input type="hidden" class="form-control" name="receiver_id" id="receiver_id" required>

                            <input type="text" class="form-control" placeholder="Your Message" name="message"
                                aria-label="Input group example" aria-describedby="btnGroupAddon" />
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddon">
                                <button class="btn" type="submit" id="submit" ><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                    </div>
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

<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class='bx bx-chevrons-up'></i>
    </a>
</div>



<!-- footer  -->
<!-- <script src="js/jquery-3.4.1.min.js"></script> -->
<!-- bootstarp js -->
<!-- <script src="js/bootstrap.min.js"></script> -->
<!-- sidebar menu  -->
<!-- <script src="js/metisMenu.js"></script> -->
<!-- custom js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- <script src="js/chart.min.js"></script> -->
<!-- <script src="js/charts-defaults.4032ce71.js"></script> -->
<!-- <script src="js/charts-home.a757f7e5.js"></script> -->
<!-- <script src="js/custom.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
<script>
var active_user_id= $('.person').attr("data-chat");

// alert(active_user_id);
document.querySelector('.chat[data-chat='+active_user_id+']').classList.add('active-chat');
document.querySelector('.person[data-chat='+active_user_id+']').classList.add('active');

let friends = {
        list: document.querySelector('ul.people'),
        all: document.querySelectorAll('.left .person'),
        name: ''
    },

    chat = {
        container: document.querySelector('.container .right'),
        current: null,
        person: null,
        name: document.querySelector('.container .right .top .name')
    };


friends.all.forEach(f => {
    f.addEventListener('mousedown', () => {
        f.classList.contains('active') || setAciveChat(f);
    });
});

function setAciveChat(f) {
    friends.list.querySelector('.active').classList.remove('active');
    f.classList.add('active');
    chat.current = chat.container.querySelector('.active-chat');
    chat.person = f.getAttribute('data-chat');
    chat.current.classList.remove('active-chat');
    chat.container.querySelector('[data-chat="' + chat.person + '"]').classList.add('active-chat');
    friends.name = f.querySelector('.name').innerText;
    chat.name.innerHTML = friends.name;
    $('#receiver_id').val(friends.name);

}
</script>
</body>

</html>
