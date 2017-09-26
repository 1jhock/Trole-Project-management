<?php if ($this->session->userdata('user_id')) :?>
	</div>
</div>
<? else:  ?>

<?php endif; ?>

  <input  type="hidden" id="base-url" value="<?=base_url()?>">
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>bower_components/materialize/dist/js/materialize.min.js"></script>
    <script src="<?=base_url()?>assets/js/awesomplete.min.js"></script>
    <script src="<?=base_url()?>assets/js/custom.js"></script>
    <script src="<?=base_url()?>assets/js/server.js"></script>
    <script src="<?=base_url()?>assets/js/sidebar.js"></script>
    <script src="<?=base_url()?>assets/js/files.js"></script>
    <script src="<?=base_url()?>assets/js/projects.js"></script>
  </body>
</html>