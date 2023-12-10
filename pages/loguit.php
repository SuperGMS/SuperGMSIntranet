<?php
$_SESSION = array();
session_destroy();
?>
<script language="javascript">
    window.location.href = "<?php echo $site; ?>"
</script>