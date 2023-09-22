<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
      <title></title>
   </head>
   <style>
      #chat2 .form-control {
      border-color: transparent;
      }
      #chat2 .form-control:focus {
      border-color: transparent;
      box-shadow: inset 0px 0px 0px 1px transparent;
      }
      .divider:after,
      .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
      }
      .card-body {
      overflow: auto;
      }
   </style>
   <body>
     <section style="background-color: #eee;">
         <div class="container py-5">
         <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-xl-12">
               <div class="card" id="chat2">
                  <div class="card-header d-flex justify-content-between align-items-center p-3">
                     <h5 class="mb-0">Chat</h5>
                  </div>
                  <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height:100vh">
                     <div class="divider d-flex align-items-center mb-4">
                       <p class="text-center mx-3 mb-0" style="color: #a2aab7;">Today</p>
                     </div>
                     <?php  $chat= $this->db->where('sender_id',$this->session->userdata('micusername'))->get('chat_messages')->result_array();
                        // print_r($chat); 
                        
                         foreach($chat as $key => $rd) {?>
                     <?php// $date=$this->db->where('send',$rd['send'])->where('type','send')->get('chat_messages')->row_array(); ?>
                     <!--left side message-->
                     <?php   
                        if( !empty($rd['receive_msg'])){ ?>
                     <div class="d-flex flex-row justify-content-start mb-4">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                           alt="avatar 1" style="width: 45px; height: 100%;">
                        <div>
                           <p class="small p-2 ms-3 mb-1 rounded-3 text-white bg-primary"><?=$rd['receive_msg']?></p>
                           <p class="small ms-3 mb-3 rounded-3 text-muted"><?=(new DateTime($rd['date']))->format('F j, Y h:i A')?></p>
                        </div>
                     </div>
                     <?php  } ?>
                    <!--right side message-->
                     <div class="d-flex flex-row justify-content-end">
                        <?php   
                           if(!empty($rd['send'])){ ?>
                        <div>
                           <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary"><?=$rd['send']?></p>
                           <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end"><?=(new DateTime($rd['date']))->format('F j, Y h:i A')?></p>
                        </div>
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
                           alt="avatar 1" style="width: 45px; height: 100%;">
                        <?php   } ?>
                     </div>
                     <?php } ?>
                  </div>
                  <div class="card-footer">
                   
                     <?php $admin=$this->db->select('username')->where('user_role_id',1)->get('user_role')->row()->username; 
                        $user=$this->session->userdata('micusername'); ?>
              
                           <form action="<?=BASEURL?>user/send_message" method="post" class="text-muted d-flex justify-content-start align-items-center p-3">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                        alt="avatar 3" style="width: 40px; height: 100%;">
                                 <input type="hidden" name="sender" value="<?=$user?>">
                                 <input type="hidden" name="receiver" value="<?=$admin?>">
                                 <input type="text" name="message" class="form-control form-control-lg" id="exampleFormControlInput1"
                                    placeholder="Type message">
                                 <button type="submit" class="btn btn-primary">Send</button>
                                
                           </form>
                          
                        </div>
                       
                     </div>
                  </div>
               </div>
            </div>

      </section>
      




      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   </body>
</html>





