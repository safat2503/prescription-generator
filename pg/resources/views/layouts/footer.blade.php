<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 </strong> All rights reserved.
      </footer>

      <?php
$message = '';

    ?>
    @if(Session::has('message'))
      @php
$message = Session::get('message');
      @endif

      <script>
  Let message = '<?php echo $message;?>';
  if(message !== ''){
    showCustomMessage(message);
  }

  $(".dtp").datepicker({
    autoclose::true
  });
</script>

<script>
  $(function (){
    $(".select2").select2();
  });
</script>