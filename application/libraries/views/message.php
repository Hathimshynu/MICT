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
            <div class="row card p-4">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 c-scroll">
                    <div class="right">
                        <?php $messages = $this->db->where('m_from',$userdata['userid'])->get('messages')->result_array()?>
                        <div class="chat" data-chat="person2">
                            <div class="convo">
                                <div class="conversation-start">
                                    <span>Today, 5:38 PM</span>
                                </div>
                                <?php $count=1; foreach ($messages as $key => $n) { ?>
                                <?php if(!empty($n['message'])) { ?>
                                <div class="bubble you">
                                    <?=$n['message']?>
                                </div>
                                <?php } if(!empty($n['replay'])) { ?>
                                <div class="bubble me">
                                    <?=$n['replay']?>
                                </div>
                                <?php } }?>

                            </div>
                        </div>
                        <form action="<?=BASEURL?>message" method="POST">
                            <div class="input-group c-send">
                                <input type="hidden" class="form-control" name="user_id"
                                    value="<?=$userdata['userid']?>" required>

                                <input type="text" name="message" class="form-control" placeholder="Your Message"
                                    aria-label="Input group example" aria-describedby="btnGroupAddon" />
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="btnGroupAddon">
                                        <button class="btn" type="submit" ><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                        
                                    </div>

                                </div>
                            </div>
                        </form>

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
<script src="js/jquery-3.4.1.min.js"></script>
<!-- bootstarp js -->
<script src="js/bootstrap.min.js"></script>
<!-- sidebar menu  -->
<script src="js/metisMenu.js"></script>
<!-- custom js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/charts-defaults.4032ce71.js"></script>
<script src="js/charts-home.a757f7e5.js"></script>
<script src="js/custom.js"></script>
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
document.querySelector('.chat[data-chat=person2]').classList.add('active-chat');
document.querySelector('.person[data-chat=person2]').classList.add('active');

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
}
</script>
</body>

</html>
