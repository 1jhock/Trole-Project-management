<?php if ($this->session->userdata('user_id')) : ?>
 <div class="row" id="">
   <div class="col l2" id="side">

      <div id="head">
        <img src="<?=base_url()?>assets/img/profile.jpg" alt="" class="reponsive-img">
        <span id="name"><?=$this->session->userdata('name')?></span>
        <span id="email"><?=$this->session->userdata('email')?></span>
      </div>
      <ul id="list">
      <li><a href="<?=base_url()?>manage/home" class="waves-effect small waves-light"><i class="fa fa-tasks"></i>Dashboard</a></li>
        <li><a href="<?=base_url()?>manage/files" class="waves-effect small waves-light"><i class="fa fa-files-o"></i>Files</a></li>
        <li><a href="<?=base_url()?>manage/projects" class="waves-effect small waves-light"><i class="fa fa-folder-open-o"></i>Projects</a></li>
      </ul>
      <a href="<?=base_url()?>manage/logout">Logout&nbsp;&nbsp;<i class="fa fa-sign-out"></i></a> 
   </div>
  <div class="col l10"> 
<?php else: ?>
  
<?php endif; ?>